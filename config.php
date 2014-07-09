<?php
/*
	fearqdb - quote database system
	Copyright (C) 2011-2012 David Martí <neikokz at gmail dot com>

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU Affero General Public License as
	published by the Free Software Foundation, either version 3 of the
	License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU Affero General Public License for more details.

	You should have received a copy of the GNU Affero General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/* ---------- DB ---------- */
/* mysql or sqlite */
$config['db']['type'] = mysql;

/* show all queries */
$config['db']['debug'] = false;

/* use a persistent connection. could not work,
	but it is preferable. */
$config['db']['persistent'] = false;

/* for sqlite */
$config['db']['file'] = null;

$heroku_mysql_string = getenv('CLEARDB_DATABASE_URL');
$ra = preg_split('/[:\/@?]/', $heroku_mysql_string);

/* for mysql */
$config['db']['user'] = $ra[3];
$config['db']['pass'] = $ra[4];
$config['db']['name'] = $ra[6];
/* 'socket' takes precedence over 'host'
	(it is obviously not possible to use both at once) */
$config['db']['socket'] = null;
$config['db']['host'] = $ra[5];

/* ---------- MEMCACHE ---------- */
$config['memcache']['enabled'] = false;
$config['memcache']['server'] = null;
$config['memcache']['port'] = null;
$config['memcache']['prefix'] = 'fearqdb';
$config['memcache']['debug'] = false;
