create table #prefix#contacts (
	id integer primary key,
	name char(48) not null,
	email char(48) not null,
	phone char(32) not null
);
