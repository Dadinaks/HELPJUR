select distinct
    bkdosprt.age AGENCE,
    bkcli.ges code_gestionnaire,
    bkcli.cli CODE_CLIENT,
    trim(replace(replace(replace(replace(bkcli.nomrest,';',' '),chr(10),' '),chr(9),' '),chr(13),'')) NOM,
    bkcli.qua CODE_QUALITE,
    (select lib1 from bknom where ctab = '188' and cacc = bkcli.seg) segment,
    
    

    NVL(
	(select emp from bkconvention where conv_num=(select conv_num from bkcliconvention where bkcliconvention.cli=bkcli.cli and bkcliconvention.date_app=(select max(bkcliconvention.date_app) from bkcliconvention where bkcliconvention.cli=bkcli.cli))),
	(select emp from bkprfcli where bkprfcli.cli = bkcli.cli and   demb = (select max(demb) from bkprfcli where bkcli.cli = bkprfcli.cli))
    ) code_employeur,


    NVL(
	replace((select nom from bkempl where emp=(select emp from bkconvention where conv_num=(select conv_num from bkcliconvention where bkcliconvention.cli=bkcli.cli and bkcliconvention.date_app=(select max(bkcliconvention.date_app) from bkcliconvention where bkcliconvention.cli=bkcli.cli)))),chr(10),''),
	replace((select nom from bkempl where emp = (select emp from bkprfcli where bkprfcli.cli = bkcli.cli and   demb = (select max(demb) from bkprfcli where bkcli.cli = bkprfcli.cli))),chr(10),'')
    ) libelle_employeur,


    replace((select prf from bkprfcli where bkprfcli.cli=bkcli.cli and   demb = (select max(demb) from bkprfcli where bkcli.cli = bkprfcli.cli)),chr(10),'') code_profession,
    replace((select lib1 from bknom where ctab = '045' and cacc = (select prf from bkprfcli where bkprfcli.cli = bkcli.cli and   demb = (select max(demb) from bkprfcli where bkcli.cli = bkprfcli.cli))),chr(10),'') libelle_profession,
    bkdosprt.eve numero_dossier_pret,
    bkdosprt.ave avenant,
    (case when (bkdosprt.typ in ('047','046','045','044','043','042','041','040')) then 'CAP IMMO'
       when (bkdosprt.typ in ('001','002','003','004','005','006','007','008','009','010','016','017','018','019','020','021','022','023','099','199','116','117','118','162','170','171','182')) then 'CAP CONSO'
       when (bkdosprt.typ in ('060','061','062','063','064','065','068','098')) then 'CAP DRH'
       when (bkdosprt.typ in ('100','101','102','103','104','105','108','109','110','111','112','113','114','115','150','151','152','153','154','155','156','157','011','131')) then 'CREDIT E/SE - PROF'
       when (bkdosprt.typ in ('106','107','163','164','165','166','167','168')) then 'CREDIT FIHARIANA'
       when bkdosprt.typ = '161' then 'CREDIT PEJAA'
       when (bkdosprt.typ in ('013','015','173','174','175','176','181')) then 'CREDIT KRED'
       else 'AUTRE'
    end) as type_credit,
    bkdosprt.typ Code_type_pret,
    replace((select libe from bktyprt where bktyprt.typ=bkdosprt.typ),chr(10),'') libelle_type_pret,
    bkdosprt.dev devise_pret,
    bkdosprt.mon montant_pret,
    bkdosprt.eta as CODE_ETAT_DOSSIER,
    (case when bkdosprt.eta = 'VA' then 
		(case
		    when bkdosprt.ctr in (1,3,5) then 'Dossier valide - en cours'
		    else 'Dossier valide - soldé'
		end)
	else 'Déchéance du terme' end) as LIB_ETAT_DOSSIER,
 (
	select sum(
	    sde*NVL(
		(select tind from bktau where dev=c.dev and dco=today),
		(select tind from bktau where dev=c.dev and dco=today-1)
	    )) from bkcom c
	inner join bkcptprt p on (c.ncp = p.ncp and c.dev = p.dev and c.age = p.age)
	where c.cli = bkcli.cli and (p.nat in ('006','008','009','010')) and p.eve = bkdosprt.eve and p.ave = bkdosprt.ave
    ) as MONTANT_IMPAYES,

    (select count(distinct rec.dva) from bkrecimpay rec
	inner join bkechprt ech on (rec.iden[1,6] = ech.eve and (rec.iden[7,8]*1) = (ech.ave*1) and rec.dva = ech.dva)
	where rec.cli = bkcli.cli and rec.iden[1,6] = bkdosprt.eve and (rec.iden[7,8]*1) = (bkdosprt.ave*1) and rec.ctr = 1 and (ech.ctr='8' and ech.eta='VA')) as NOMBRE_IMPAYES,
    
    (select min(rec.dva) from bkrecimpay rec
	inner join bkechprt ech on (rec.iden[1,6] = ech.eve and (rec.iden[7,8]*1) = (ech.ave*1) and rec.dva = ech.dva)
	where rec.cli = bkcli.cli and rec.iden[1,6] = bkdosprt.eve and (rec.iden[7,8]*1) = (bkdosprt.ave*1) and rec.ctr = 1 and (ech.ctr='8' and ech.eta='VA')) DATE_PREMIER_IMPAYE,

    today - (select min(rec.dva) from bkrecimpay rec
	inner join bkechprt ech on (rec.iden[1,6] = ech.eve and (rec.iden[7,8]*1) = (ech.ave*1) and rec.dva = ech.dva)
	where rec.cli = bkcli.cli and rec.iden[1,6] = bkdosprt.eve and (rec.iden[7,8]*1) = (bkdosprt.ave*1) and rec.ctr = 1 and (ech.ctr='8' and ech.eta='VA')) Nombre_jour_retard,

    (select bkechprt.res from bkechprt where num=bkdosprt.dech and eve=bkdosprt.eve and ave=bkdosprt.ave)
	   *NVL(
		(select tind from bktau where dev=bkdosprt.dev and dco=today),
		(select tind from bktau where dev=bkdosprt.dev and dco=today-1)
	    ) CRD_en_mga,

    bkdosprt.dmep date_mise_en_place,
    bkdosprt.dpec date_premiere_echeance,
    bkdosprt.ddec date_derniere_echeance,
    bkdosprt.reference,
    replace((select conv_num from bkcliconvention where bkcliconvention.cli=bkcli.cli and bkcliconvention.date_app=(select max(bkcliconvention.date_app) from bkcliconvention where bkcliconvention.cli=bkcli.cli)),chr(10),'') code_convention,
    replace((select conv_lib from bkconvention where conv_num=(select conv_num from bkcliconvention where bkcliconvention.cli=bkcli.cli and bkcliconvention.date_app=(select max(bkcliconvention.date_app) from bkcliconvention where bkcliconvention.cli=bkcli.cli) )),chr(10),'')  as libelle_convention,

    (select vala from bkicli where iden='005' and cli = bkcli.cli) note_intrinseque

    
from bkdosprt
left join bkcli on bkcli.cli=bkdosprt.cli  

where ((bkdosprt.eta = 'VA' and bkdosprt.ctr in (1,3,5,9)) or (bkdosprt.eta = 'DE'))
