#
# Table structure for table 'tx_dlrealestate_domain_model_realestate'
#
CREATE TABLE tx_dlrealestate_domain_model_realestate (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	residential_area varchar(255) DEFAULT '' NOT NULL,
	rent_from varchar(255) DEFAULT '' NOT NULL,
	rent_to varchar(255) DEFAULT '' NOT NULL,
	no_of_rooms varchar(255) DEFAULT '' NOT NULL,
	rent int(11) DEFAULT '0' NOT NULL,
	furnitured smallint(5) unsigned DEFAULT '0' NOT NULL,
	handicap_adapted smallint(5) unsigned DEFAULT '0' NOT NULL,
	elevator smallint(5) unsigned DEFAULT '0' NOT NULL,
	animals_allowed smallint(5) unsigned DEFAULT '0' NOT NULL,
	other varchar(255) DEFAULT '' NOT NULL,
	upload_images1 int(11) unsigned NOT NULL default '0',
	upload_images2 int(11) unsigned NOT NULL default '0',
	upload_images3 int(11) unsigned NOT NULL default '0',
	upload_images4 int(11) unsigned NOT NULL default '0',
	upload_images5 int(11) unsigned NOT NULL default '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder