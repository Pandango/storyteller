TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `userprofile_after_insert` AFTER INSERT ON `user` FOR EACH ROW BEGIN\n	 INSERT INTO userprofile (userId)\n        VALUES (new.userId);\nEND'
sql_modes=1073741824
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_general_ci'
db_cl_names='utf8_general_ci'
