<?php
class ostore_pro_import extends WP_Import{

	function set_widgets() {
		
		$sidebars_widgets_code = 'YToxMTp7czoxOToid3BfaW5hY3RpdmVfd2lkZ2V0cyI7YTowOnt9czoxMzoicmlnaHQtc2lkZWJhciI7YTo5OntpOjA7czo4OiJzZWFyY2gtMiI7aToxO3M6MjY6Indvb2NvbW1lcmNlX3ByaWNlX2ZpbHRlci0yIjtpOjI7czoyNToid29vY29tbWVyY2VfbGF5ZXJlZF9uYXYtMiI7aTozO3M6Mjc6Indvb2NvbW1lcmNlX3JhdGluZ19maWx0ZXItMiI7aTo0O3M6MTQ6InJlY2VudC1wb3N0cy0yIjtpOjU7czoxNzoicmVjZW50LWNvbW1lbnRzLTIiO2k6NjtzOjEwOiJhcmNoaXZlcy0yIjtpOjc7czoxMjoiY2F0ZWdvcmllcy0yIjtpOjg7czo2OiJtZXRhLTIiO31zOjEyOiJsZWZ0LXNpZGViYXIiO2E6NDp7aTowO3M6ODoic2VhcmNoLTMiO2k6MTtzOjEyOiJjYXRlZ29yaWVzLTQiO2k6MjtzOjE3OiJyZWNlbnQtY29tbWVudHMtNCI7aTozO3M6MTQ6InJlY2VudC1wb3N0cy00Ijt9czo5OiJob21lX3BhZ2UiO2E6MTU6e2k6MDtzOjQ0OiJvc3RvcmVfcHJvX2NhdGVnb3J5X2NvbGxlY3Rpb25fd2lkZ2V0X2FyZWEtMiI7aToxO3M6MTc6InRhYl93aWRnZXRfYXJlYS0yIjtpOjI7czozNzoib3N0b3JlX3Byb19obHBfcHJvZHVjdHNfd2lkZ2V0X2FyZWEtMiI7aTozO3M6NDQ6Im9zdG9yZV9wcm9fY2F0ZWdvcnlfY29sbGVjdGlvbl93aWRnZXRfYXJlYS0zIjtpOjQ7czozMzoib3N0b3JlX3Byb19ob3RfZGVhbF93aWRnZXRfYXJlYS0yIjtpOjU7czoxOToib3N0b3JlX3Byb19iYW5uZXItMiI7aTo2O3M6MTc6InRhYl93aWRnZXRfYXJlYS0zIjtpOjc7czo0ODoib3N0b3JlX3Byb19jYXRlZ29yeV9wcm9kdWN0X3NsaWRlcl93aWRnZXRfYXJlYS0yIjtpOjg7czo0ODoib3N0b3JlX3Byb19jYXRlZ29yeV9wcm9kdWN0X3NsaWRlcl93aWRnZXRfYXJlYS0zIjtpOjk7czo0NDoib3N0b3JlX3Byb19jYXRlZ29yeV9jb2xsZWN0aW9uX3dpZGdldF9hcmVhLTQiO2k6MTA7czozNzoib3N0b3JlX3Byb19wcm9kdWN0X2xpc3Rfd2lkZ2V0X2FyZWEtMyI7aToxMTtzOjQwOiJvc3RvcmVfcHJvX3NwZWNpYWxfcHJvZHVjdF93aWRnZXRfYXJlYS0yIjtpOjEyO3M6MjY6InRlc3RpbW9uaWFsc193aWRnZXRfYXJlYS0yIjtpOjEzO3M6MTg6ImJsb2dfd2lkZ2V0X2FyZWEtMiI7aToxNDtzOjM3OiJvc3RvcmVfcHJvX3Byb2R1Y3RfbGlzdF93aWRnZXRfYXJlYS0yIjt9czoxMjoiZmlyc3RfZm9vdGVyIjthOjE6e2k6MDtzOjE3OiJyZWNlbnQtY29tbWVudHMtMyI7fXM6MTM6InNlY29uZF9mb290ZXIiO2E6MTp7aTowO3M6MTQ6InJlY2VudC1wb3N0cy0zIjt9czoxMjoidGhpcmRfZm9vdGVyIjthOjE6e2k6MDtzOjEyOiJjYXRlZ29yaWVzLTMiO31zOjEyOiJmb3J0aF9mb290ZXIiO2E6MTp7aTowO3M6MjI6Indvb2NvbW1lcmNlX3Byb2R1Y3RzLTMiO31zOjEyOiJmaWZ0aF9mb290ZXIiO2E6MTp7aTowO3M6MTE6InRhZ19jbG91ZC0yIjt9czoxMDoiaGVhZGVyLWFkZCI7YTowOnt9czoxMzoiYXJyYXlfdmVyc2lvbiI7aTozO30';
		$sidebars_widgets_code = base64_decode($sidebars_widgets_code);
	    $sidebars_widgets_code = unserialize($sidebars_widgets_code);
	    update_option('sidebars_widgets', $sidebars_widgets_code);

	    $all_widgets_code = 'YTo0MTp7aTowO086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjI6Ijk3IjtzOjExOiJvcHRpb25fbmFtZSI7czoxNToid2lkZ2V0X2FyY2hpdmVzIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6OTQ6ImE6Mjp7aToyO2E6Mzp7czo1OiJ0aXRsZSI7czowOiIiO3M6NToiY291bnQiO2k6MDtzOjg6ImRyb3Bkb3duIjtpOjA7fXM6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aToxO086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjE1MSI7czoxMToib3B0aW9uX25hbWUiO3M6MjM6IndpZGdldF9ibG9nX3dpZGdldF9hcmVhIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6MzkxOiJhOjI6e2k6MjthOjY6e3M6MjY6Im9zdG9yZV9wcm9faG9tZV9ibG9nX3RpdGxlIjtzOjExOiJMYXRlc3QgTmV3cyI7czoyNToib3N0b3JlX3Byb19ob21lX2Jsb2dfZGVzYyI7czo3NDoiTG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4iO3M6MjQ6Im9zdG9yZV9wcm9faGVhZGVyX2xheW91dCI7czoxNToiaGVhZGVyLWxheW91dC0yIjtzOjE4OiJjYXRlZ29yeV9ob21lX2Jsb2ciO3M6MjoiMzEiO3M6Mjc6Im9zdG9yZV9wcm9faG9tZV9ibG9nX251bWJlciI7aTozO3M6Mjc6Im9zdG9yZV9wcm9faG9tZV9zZWxlY3RfdmlldyI7czoxMToiYWx0ZXJuYXRpdmUiO31zOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6MjtPOjg6InN0ZENsYXNzIjo0OntzOjk6Im9wdGlvbl9pZCI7czozOiIxMDEiO3M6MTE6Im9wdGlvbl9uYW1lIjtzOjE1OiJ3aWRnZXRfY2FsZW5kYXIiO3M6MTI6Im9wdGlvbl92YWx1ZSI7czozMDoiYToxOntzOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6MztPOjg6InN0ZENsYXNzIjo0OntzOjk6Im9wdGlvbl9pZCI7czoyOiI3OCI7czoxMToib3B0aW9uX25hbWUiO3M6MTc6IndpZGdldF9jYXRlZ29yaWVzIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6Mjk0OiJhOjQ6e2k6MjthOjQ6e3M6NToidGl0bGUiO3M6MDoiIjtzOjU6ImNvdW50IjtpOjA7czoxMjoiaGllcmFyY2hpY2FsIjtpOjA7czo4OiJkcm9wZG93biI7aTowO31pOjM7YTo0OntzOjU6InRpdGxlIjtzOjA6IiI7czo1OiJjb3VudCI7aTowO3M6MTI6ImhpZXJhcmNoaWNhbCI7aTowO3M6ODoiZHJvcGRvd24iO2k6MDt9aTo0O2E6NDp7czo1OiJ0aXRsZSI7czowOiIiO3M6NToiY291bnQiO2k6MDtzOjEyOiJoaWVyYXJjaGljYWwiO2k6MDtzOjg6ImRyb3Bkb3duIjtpOjA7fXM6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aTo0O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjEwNyI7czoxMToib3B0aW9uX25hbWUiO3M6MTg6IndpZGdldF9jdXN0b21faHRtbCI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjMwOiJhOjE6e3M6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aTo1O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjUxNyI7czoxMToib3B0aW9uX25hbWUiO3M6MjQ6IndpZGdldF9tYzR3cF9mb3JtX3dpZGdldCI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjMwOiJhOjE6e3M6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aTo2O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjEwMiI7czoxMToib3B0aW9uX25hbWUiO3M6MTg6IndpZGdldF9tZWRpYV9hdWRpbyI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjMwOiJhOjE6e3M6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aTo3O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjEwMyI7czoxMToib3B0aW9uX25hbWUiO3M6MTg6IndpZGdldF9tZWRpYV9pbWFnZSI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjMwOiJhOjE6e3M6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aTo4O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjEwNCI7czoxMToib3B0aW9uX25hbWUiO3M6MTg6IndpZGdldF9tZWRpYV92aWRlbyI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjMwOiJhOjE6e3M6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aTo5O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjI6Ijk4IjtzOjExOiJvcHRpb25fbmFtZSI7czoxMToid2lkZ2V0X21ldGEiO3M6MTI6Im9wdGlvbl92YWx1ZSI7czo1OToiYToyOntpOjI7YToxOntzOjU6InRpdGxlIjtzOjA6IiI7fXM6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aToxMDtPOjg6InN0ZENsYXNzIjo0OntzOjk6Im9wdGlvbl9pZCI7czozOiIxMDYiO3M6MTE6Im9wdGlvbl9uYW1lIjtzOjE1OiJ3aWRnZXRfbmF2X21lbnUiO3M6MTI6Im9wdGlvbl92YWx1ZSI7czozMDoiYToxOntzOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6MTE7Tzo4OiJzdGRDbGFzcyI6NDp7czo5OiJvcHRpb25faWQiO3M6MzoiMTU1IjtzOjExOiJvcHRpb25fbmFtZSI7czoyNDoid2lkZ2V0X29zdG9yZV9wcm9fYmFubmVyIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6Mjk2OiJhOjI6e2k6MjthOjU6e3M6NToidGl0bGUiO3M6MTc6IlVQVE8gNzAlIERJU0NPVU5UIjtzOjE4OiJiYW5uZXJfZGVzY3JpcHRpb24iO3M6MTE6IldJTlRFUiBTQUxFIjtzOjE3OiJiYWNrZ3JvdW5kLWltZy1pZCI7czozOiIzMDkiO3M6MTQ6ImJhbm5lcl9idG5fdXJsIjtzOjcyOiJodHRwOi8vZGVtby50aGVtZXJlbGljLmNvbS9vc3RvcmUtcHJvL3Byb2R1Y3QtY2F0ZWdvcnkvd2F0Y2gtY29sbGVjdGlvbi8iO3M6MTU6ImJhbm5lcl9idG5fdGV4dCI7czo3OiJCVVkgTk9XIjt9czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjEyO086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjE0OSI7czoxMToib3B0aW9uX25hbWUiO3M6NDk6IndpZGdldF9vc3RvcmVfcHJvX2NhdGVnb3J5X2NvbGxlY3Rpb25fd2lkZ2V0X2FyZWEiO3M6MTI6Im9wdGlvbl92YWx1ZSI7czo5NTU6ImE6NDp7aToyO2E6NTp7czoyNzoib3N0b3JlX3Byb19jb2xsZWN0aW9uX3RpdGxlIjtzOjA6IiI7czoyNjoib3N0b3JlX3Byb19jb2xsZWN0aW9uX2Rlc2MiO3M6MDoiIjtzOjI0OiJvc3RvcmVfcHJvX2hlYWRlcl9sYXlvdXQiO3M6MTU6ImhlYWRlci1sYXlvdXQtMSI7czozMDoib3N0b3JlX3Byb19jYXRlZ29yeV9jb2xsZWN0aW9uIjthOjM6e2k6MjI7czoxOiIxIjtpOjE1O3M6MToiMSI7aToyMDtzOjE6IjEiO31zOjI4OiJvc3RvcmVfcHJvX2NvbGxlY3Rpb25fb3B0aW9uIjtzOjEzOiIzLWNvbHVtbi1ncmlkIjt9aTozO2E6NTp7czoyNzoib3N0b3JlX3Byb19jb2xsZWN0aW9uX3RpdGxlIjtzOjA6IiI7czoyNjoib3N0b3JlX3Byb19jb2xsZWN0aW9uX2Rlc2MiO3M6MDoiIjtzOjI0OiJvc3RvcmVfcHJvX2hlYWRlcl9sYXlvdXQiO3M6MTU6ImhlYWRlci1sYXlvdXQtMSI7czozMDoib3N0b3JlX3Byb19jYXRlZ29yeV9jb2xsZWN0aW9uIjthOjU6e2k6MjA7czoxOiIxIjtpOjE2O3M6MToiMSI7aToyMTtzOjE6IjEiO2k6MjM7czoxOiIxIjtpOjI0O3M6MToiMSI7fXM6Mjg6Im9zdG9yZV9wcm9fY29sbGVjdGlvbl9vcHRpb24iO3M6MjA6InJhbmRvbS1zaXplLWNhdGVnb3J5Ijt9aTo0O2E6NTp7czoyNzoib3N0b3JlX3Byb19jb2xsZWN0aW9uX3RpdGxlIjtzOjA6IiI7czoyNjoib3N0b3JlX3Byb19jb2xsZWN0aW9uX2Rlc2MiO3M6MDoiIjtzOjI0OiJvc3RvcmVfcHJvX2hlYWRlcl9sYXlvdXQiO3M6MTU6ImhlYWRlci1sYXlvdXQtMSI7czozMDoib3N0b3JlX3Byb19jYXRlZ29yeV9jb2xsZWN0aW9uIjthOjU6e2k6MTU7czoxOiIxIjtpOjIwO3M6MToiMSI7aToxNjtzOjE6IjEiO2k6MjE7czoxOiIxIjtpOjIzO3M6MToiMSI7fXM6Mjg6Im9zdG9yZV9wcm9fY29sbGVjdGlvbl9vcHRpb24iO3M6MTU6ImNhdGVnb3J5LXNsaWRlciI7fXM6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aToxMztPOjg6InN0ZENsYXNzIjo0OntzOjk6Im9wdGlvbl9pZCI7czozOiIxNTciO3M6MTE6Im9wdGlvbl9uYW1lIjtzOjUzOiJ3aWRnZXRfb3N0b3JlX3Byb19jYXRlZ29yeV9wcm9kdWN0X3NsaWRlcl93aWRnZXRfYXJlYSI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjcxNToiYTozOntpOjI7YTo2OntzOjMzOiJvc3RvcmVfcHJvX2NhdGVnb3J5X3Byb2R1Y3RfdGl0bGUiO3M6MjA6IkZvb3R3ZWFyIENvbGxlY3Rpb25zIjtzOjMyOiJvc3RvcmVfcHJvX2NhdGVnb3J5X3Byb2R1Y3RfZGVzYyI7czo0NToiTnVsbGEgcXVpcyBsb3JlbSB1dCBsaWJlcm8gbWFsZXN1YWRhIGZldWdpYXQuIjtzOjI0OiJvc3RvcmVfcHJvX2hlYWRlcl9sYXlvdXQiO3M6MTU6ImhlYWRlci1sYXlvdXQtMiI7czoyNzoiY2F0ZWdvcnlfcHJvZHVjdF9jb2xsZWN0aW9uIjtzOjI6IjIwIjtzOjIyOiJjYXRlZ29yeV9wcm9kdWN0X3N0eWxlIjtzOjE3OiJwcm9kdWN0cy1jYXRlZ29yeSI7czozNDoib3N0b3JlX3Byb19jYXRlZ29yeV9wcm9kdWN0X251bWJlciI7czoxOiIzIjt9aTozO2E6Njp7czozMzoib3N0b3JlX3Byb19jYXRlZ29yeV9wcm9kdWN0X3RpdGxlIjtzOjA6IiI7czozMjoib3N0b3JlX3Byb19jYXRlZ29yeV9wcm9kdWN0X2Rlc2MiO3M6MDoiIjtzOjI0OiJvc3RvcmVfcHJvX2hlYWRlcl9sYXlvdXQiO3M6MTU6ImhlYWRlci1sYXlvdXQtMSI7czoyNzoiY2F0ZWdvcnlfcHJvZHVjdF9jb2xsZWN0aW9uIjtzOjI6IjIxIjtzOjIyOiJjYXRlZ29yeV9wcm9kdWN0X3N0eWxlIjtzOjE3OiJjYXRlZ29yeS1wcm9kdWN0cyI7czozNDoib3N0b3JlX3Byb19jYXRlZ29yeV9wcm9kdWN0X251bWJlciI7czoxOiIzIjt9czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjE0O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjE1NCI7czoxMToib3B0aW9uX25hbWUiO3M6NDI6IndpZGdldF9vc3RvcmVfcHJvX2hscF9wcm9kdWN0c193aWRnZXRfYXJlYSI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjQwODoiYToyOntpOjI7YTo2OntzOjI4OiJvc3RvcmVfcHJvX2hscF9wcm9kdWN0X3RpdGxlIjtzOjIwOiJITFAgUHJvZHVjdHMgRGlzcGxheSI7czoyNzoib3N0b3JlX3Byb19obHBfcHJvZHVjdF9kZXNjIjtzOjYwOiJNYXVyaXMgYmxhbmRpdCBhbGlxdWV0IGVsaXQsIGVnZXQgdGluY2lkdW50IG5pYmggcHVsdmluYXIgYS4iO3M6MjQ6Im9zdG9yZV9wcm9faGVhZGVyX2xheW91dCI7czoxNToiaGVhZGVyLWxheW91dC0yIjtzOjI5OiJvc3RvcmVfcHJvX2hscF9wcm9kdWN0c19zdHlsZSI7czo2OiJzdHlsZTIiO3M6MjM6Im9zdG9yZV9wcm9faG90X2RlYWxfY2F0IjthOjE6e2k6MjQ7czoxOiIxIjt9czozMDoib3N0b3JlX3Byb19ob3RfZGVhbF9wb3N0X2NvdW50IjtzOjE6IjQiO31zOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6MTU7Tzo4OiJzdGRDbGFzcyI6NDp7czo5OiJvcHRpb25faWQiO3M6MzoiMTUyIjtzOjExOiJvcHRpb25fbmFtZSI7czozODoid2lkZ2V0X29zdG9yZV9wcm9faG90X2RlYWxfd2lkZ2V0X2FyZWEiO3M6MTI6Im9wdGlvbl92YWx1ZSI7czozNTQ6ImE6Mjp7aToyO2E6NTp7czoyNToib3N0b3JlX3Byb19ob3RfZGVhbF90aXRsZSI7czoxNDoiU3BlY2lhbCBPZmZlcnMiO3M6MjQ6Im9zdG9yZV9wcm9faG90X2RlYWxfZGVzYyI7czo2MDoiTWF1cmlzIGJsYW5kaXQgYWxpcXVldCBlbGl0LCBlZ2V0IHRpbmNpZHVudCBuaWJoIHB1bHZpbmFyIGEuIjtzOjI0OiJvc3RvcmVfcHJvX2hlYWRlcl9sYXlvdXQiO3M6MTU6ImhlYWRlci1sYXlvdXQtMiI7czoyODoiaG90X2RlYWxfY2F0ZWdvcnlfY29sbGVjdGlvbiI7YToxOntpOjIzO3M6MToiMSI7fXM6MzM6Im9zdG9yZV9wcm9faG90X2RlYWxfcHJvZHVjdF9jb3VudCI7czoxOiI4Ijt9czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjE2O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjE1NiI7czoxMToib3B0aW9uX25hbWUiO3M6NDI6IndpZGdldF9vc3RvcmVfcHJvX3Byb2R1Y3RfbGlzdF93aWRnZXRfYXJlYSI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjYzNDoiYTozOntpOjI7YTo1OntzOjI5OiJvc3RvcmVfcHJvX3Byb2R1Y3RfbGlzdF90aXRsZSI7czowOiIiO3M6Mjg6Im9zdG9yZV9wcm9fcHJvZHVjdF9saXN0X2Rlc2MiO3M6MDoiIjtzOjI0OiJvc3RvcmVfcHJvX2hlYWRlcl9sYXlvdXQiO3M6MTU6ImhlYWRlci1sYXlvdXQtMSI7czozMjoicHJvZHVjdF9saXN0X2NhdGVnb3J5X2NvbGxlY3Rpb24iO2E6Mzp7aToyMjtzOjE6IjEiO2k6MjE7czoxOiIxIjtpOjI0O3M6MToiMSI7fXM6Mjk6Im9zdG9yZV9wcm9fcHJvZHVjdF9saXN0X3N0eWxlIjtzOjIwOiJwcm9kdWN0LWxpc3Qtc3R5bGUtMSI7fWk6MzthOjU6e3M6Mjk6Im9zdG9yZV9wcm9fcHJvZHVjdF9saXN0X3RpdGxlIjtzOjA6IiI7czoyODoib3N0b3JlX3Byb19wcm9kdWN0X2xpc3RfZGVzYyI7czowOiIiO3M6MjQ6Im9zdG9yZV9wcm9faGVhZGVyX2xheW91dCI7czoxNToiaGVhZGVyLWxheW91dC0yIjtzOjMyOiJwcm9kdWN0X2xpc3RfY2F0ZWdvcnlfY29sbGVjdGlvbiI7YTozOntpOjIyO3M6MToiMSI7aToyMDtzOjE6IjEiO2k6MTY7czoxOiIxIjt9czoyOToib3N0b3JlX3Byb19wcm9kdWN0X2xpc3Rfc3R5bGUiO3M6MjA6InByb2R1Y3QtbGlzdC1zdHlsZS0yIjt9czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjE3O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjE1MyI7czoxMToib3B0aW9uX25hbWUiO3M6NDE6IndpZGdldF9vc3RvcmVfcHJvX3NlcnZpY2VfYm94X3dpZGdldF9hcmVhIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6MzA6ImE6MTp7czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjE4O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjE1OSI7czoxMToib3B0aW9uX25hbWUiO3M6NDU6IndpZGdldF9vc3RvcmVfcHJvX3NwZWNpYWxfcHJvZHVjdF93aWRnZXRfYXJlYSI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjQxNToiYToyOntpOjI7YTo2OntzOjMyOiJvc3RvcmVfcHJvX3NwZWNpYWxfcHJvZHVjdF90aXRsZSI7czoxNjoiU3BlY2lhbCBwcm9kdWN0cyI7czozMToib3N0b3JlX3Byb19zcGVjaWFsX3Byb2R1Y3RfZGVzYyI7czo0NToiTnVsbGEgcXVpcyBsb3JlbSB1dCBsaWJlcm8gbWFsZXN1YWRhIGZldWdpYXQuIjtzOjI0OiJvc3RvcmVfcHJvX2hlYWRlcl9sYXlvdXQiO3M6MTU6ImhlYWRlci1sYXlvdXQtMiI7czozMDoic3BlY2lhbF9wcm9kdWN0X2NhdGVnb3J5X2ZpcnN0IjthOjI6e2k6MjE7czoxOiIxIjtpOjI0O3M6MToiMSI7fXM6MzM6Im9zdG9yZV9wcm9fc3BlY2lhbF9wcm9kdWN0X251bWJlciI7czoxOiIxIjtzOjE5OiJzcGVjaWFsX3Byb2R1Y3RfY29sIjtzOjEwOiJ0d29fY29sdW1uIjt9czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjE5O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjEwMCI7czoxMToib3B0aW9uX25hbWUiO3M6MTI6IndpZGdldF9wYWdlcyI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjMwOiJhOjE6e3M6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aToyMDtPOjg6InN0ZENsYXNzIjo0OntzOjk6Im9wdGlvbl9pZCI7czoyOiI5NiI7czoxMToib3B0aW9uX25hbWUiO3M6MjI6IndpZGdldF9yZWNlbnQtY29tbWVudHMiO3M6MTI6Im9wdGlvbl92YWx1ZSI7czoxNjg6ImE6NDp7aToyO2E6Mjp7czo1OiJ0aXRsZSI7czowOiIiO3M6NjoibnVtYmVyIjtpOjU7fWk6MzthOjI6e3M6NToidGl0bGUiO3M6MDoiIjtzOjY6Im51bWJlciI7aTo1O31pOjQ7YToyOntzOjU6InRpdGxlIjtzOjA6IiI7czo2OiJudW1iZXIiO2k6NTt9czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjIxO086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjI6Ijk1IjtzOjExOiJvcHRpb25fbmFtZSI7czoxOToid2lkZ2V0X3JlY2VudC1wb3N0cyI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjIwODoiYTo0OntpOjI7YToyOntzOjU6InRpdGxlIjtzOjA6IiI7czo2OiJudW1iZXIiO2k6NTt9aTozO2E6Mzp7czo1OiJ0aXRsZSI7czowOiIiO3M6NjoibnVtYmVyIjtpOjU7czo5OiJzaG93X2RhdGUiO2I6MDt9aTo0O2E6Mzp7czo1OiJ0aXRsZSI7czowOiIiO3M6NjoibnVtYmVyIjtpOjU7czo5OiJzaG93X2RhdGUiO2I6MDt9czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjIyO086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjI6IjgwIjtzOjExOiJvcHRpb25fbmFtZSI7czoxMDoid2lkZ2V0X3JzcyI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjQwOiJhOjI6e2k6MTthOjA6e31zOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6MjM7Tzo4OiJzdGRDbGFzcyI6NDp7czo5OiJvcHRpb25faWQiO3M6MjoiOTQiO3M6MTE6Im9wdGlvbl9uYW1lIjtzOjEzOiJ3aWRnZXRfc2VhcmNoIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6ODg6ImE6Mzp7aToyO2E6MTp7czo1OiJ0aXRsZSI7czowOiIiO31pOjM7YToxOntzOjU6InRpdGxlIjtzOjA6IiI7fXM6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aToyNDtPOjg6InN0ZENsYXNzIjo0OntzOjk6Im9wdGlvbl9pZCI7czozOiIxNTAiO3M6MTE6Im9wdGlvbl9uYW1lIjtzOjIyOiJ3aWRnZXRfdGFiX3dpZGdldF9hcmVhIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6NjY2OiJhOjM6e2k6MjthOjY6e3M6MjA6Im9zdG9yZV9wcm9fdGFiX3JhZGlvIjtzOjI6IndvIjtzOjMwOiJkZWZhdWx0X3dvb2NvbW1lcmNlX2NvbGxlY3Rpb24iO2E6Mjp7aTowO3M6MTU6ImZlYXR1cmVfcHJvZHVjdCI7aToxO3M6MTQ6InVwc2FsZV9wcm9kdWN0Ijt9czoyMzoiY2F0ZWdvcnlfdGFiX2NvbGxlY3Rpb24iO2E6Mjp7aToyMTtzOjE6IjEiO2k6MjM7czoxOiIxIjt9czoyMToib3N0b3JlX3Byb190YWJfbnVtYmVyIjtzOjE6IjUiO3M6MjE6Im9zdG9yZV9wcm9fdGFiX2xheW91dCI7czoxMjoidGFiLWxheW91dC0xIjtzOjI4OiJvc3RvcmVfcHJvX3Byb2R1Y3RfdGFiX3N0eWxlIjtzOjEzOiJwcm9kdWN0LXNsaWRlIjt9aTozO2E6Njp7czoyMDoib3N0b3JlX3Byb190YWJfcmFkaW8iO3M6MzoiY2F0IjtzOjMwOiJkZWZhdWx0X3dvb2NvbW1lcmNlX2NvbGxlY3Rpb24iO3M6MDoiIjtzOjIzOiJjYXRlZ29yeV90YWJfY29sbGVjdGlvbiI7YToxOntpOjI0O3M6MToiMSI7fXM6MjE6Im9zdG9yZV9wcm9fdGFiX251bWJlciI7czoxOiI1IjtzOjIxOiJvc3RvcmVfcHJvX3RhYl9sYXlvdXQiO3M6MTI6InRhYi1sYXlvdXQtMyI7czoyODoib3N0b3JlX3Byb19wcm9kdWN0X3RhYl9zdHlsZSI7czoxMzoicHJvZHVjdC1zbGlkZSI7fXM6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aToyNTtPOjg6InN0ZENsYXNzIjo0OntzOjk6Im9wdGlvbl9pZCI7czozOiIxMDUiO3M6MTE6Im9wdGlvbl9uYW1lIjtzOjE2OiJ3aWRnZXRfdGFnX2Nsb3VkIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6MTA1OiJhOjI6e2k6MjthOjM6e3M6NToidGl0bGUiO3M6MDoiIjtzOjU6ImNvdW50IjtpOjA7czo4OiJ0YXhvbm9teSI7czo4OiJwb3N0X3RhZyI7fXM6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aToyNjtPOjg6InN0ZENsYXNzIjo0OntzOjk6Im9wdGlvbl9pZCI7czozOiIxNTgiO3M6MTE6Im9wdGlvbl9uYW1lIjtzOjMxOiJ3aWRnZXRfdGVzdGltb25pYWxzX3dpZGdldF9hcmVhIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6MzM3OiJhOjI6e2k6MjthOjQ6e3M6Mjk6Im9zdG9yZV9wcm9fdGVzdGltb25pYWxzX3RpdGxlIjtzOjEyOiJUZXN0aW1vbmlhbHMiO3M6MjI6Im51bWJlcl9vZl90ZXN0aW1vbmlhbHMiO3M6MToiMyI7czoyOToidGVzdGltb25pYWxzX2JhY2tncm91bmRfaW1hZ2UiO3M6ODg6Imh0dHA6Ly9kZW1vLnRoZW1lcmVsaWMuY29tL29zdG9yZS1wcm8vd3AtY29udGVudC91cGxvYWRzLzIwMTcvMTAvcGVvcGxlLTI1OTE1MzFfMTkyMC5qcGciO3M6MzA6Im9zdG9yZV9wcm9fdGVzdGltb25pYWxzX2xheW91dCI7czoyMzoibGVmdC1pbWFnZS10ZXN0aW1vbmlhbHMiO31zOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6Mjc7Tzo4OiJzdGRDbGFzcyI6NDp7czo5OiJvcHRpb25faWQiO3M6MjoiNzkiO3M6MTE6Im9wdGlvbl9uYW1lIjtzOjExOiJ3aWRnZXRfdGV4dCI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjQwOiJhOjI6e2k6MTthOjA6e31zOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6Mjg7Tzo4OiJzdGRDbGFzcyI6NDp7czo5OiJvcHRpb25faWQiO3M6MzoiMjY3IjtzOjExOiJvcHRpb25fbmFtZSI7czozMDoid2lkZ2V0X3dvb2NvbW1lcmNlX2xheWVyZWRfbmF2IjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6MTU1OiJhOjI6e2k6MjthOjQ6e3M6NToidGl0bGUiO3M6OToiRmlsdGVyIGJ5IjtzOjk6ImF0dHJpYnV0ZSI7czo1OiJjb2xvciI7czoxMjoiZGlzcGxheV90eXBlIjtzOjQ6Imxpc3QiO3M6MTA6InF1ZXJ5X3R5cGUiO3M6MzoiYW5kIjt9czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjI5O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjI2NiI7czoxMToib3B0aW9uX25hbWUiO3M6Mzg6IndpZGdldF93b29jb21tZXJjZV9sYXllcmVkX25hdl9maWx0ZXJzIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6MzA6ImE6MTp7czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjMwO086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjI2OCI7czoxMToib3B0aW9uX25hbWUiO3M6MzE6IndpZGdldF93b29jb21tZXJjZV9wcmljZV9maWx0ZXIiO3M6MTI6Im9wdGlvbl92YWx1ZSI7czo3NToiYToyOntpOjI7YToxOntzOjU6InRpdGxlIjtzOjE1OiJGaWx0ZXIgYnkgcHJpY2UiO31zOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6MzE7Tzo4OiJzdGRDbGFzcyI6NDp7czo5OiJvcHRpb25faWQiO3M6MzoiMjY5IjtzOjExOiJvcHRpb25fbmFtZSI7czozNzoid2lkZ2V0X3dvb2NvbW1lcmNlX3Byb2R1Y3RfY2F0ZWdvcmllcyI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjMwOiJhOjE6e3M6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aTozMjtPOjg6InN0ZENsYXNzIjo0OntzOjk6Im9wdGlvbl9pZCI7czozOiIyNzAiO3M6MTE6Im9wdGlvbl9uYW1lIjtzOjMzOiJ3aWRnZXRfd29vY29tbWVyY2VfcHJvZHVjdF9zZWFyY2giO3M6MTI6Im9wdGlvbl92YWx1ZSI7czozMDoiYToxOntzOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6MzM7Tzo4OiJzdGRDbGFzcyI6NDp7czo5OiJvcHRpb25faWQiO3M6MzoiMjcxIjtzOjExOiJvcHRpb25fbmFtZSI7czozNjoid2lkZ2V0X3dvb2NvbW1lcmNlX3Byb2R1Y3RfdGFnX2Nsb3VkIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6MzA6ImE6MTp7czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjM0O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjI3MiI7czoxMToib3B0aW9uX25hbWUiO3M6Mjc6IndpZGdldF93b29jb21tZXJjZV9wcm9kdWN0cyI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjE5MzoiYToyOntpOjM7YTo3OntzOjU6InRpdGxlIjtzOjg6IlByb2R1Y3RzIjtzOjY6Im51bWJlciI7aTo1O3M6NDoic2hvdyI7czowOiIiO3M6Nzoib3JkZXJieSI7czo0OiJkYXRlIjtzOjU6Im9yZGVyIjtzOjQ6ImRlc2MiO3M6OToiaGlkZV9mcmVlIjtpOjA7czoxMToic2hvd19oaWRkZW4iO2k6MDt9czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjM1O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjI3NiI7czoxMToib3B0aW9uX25hbWUiO3M6MzI6IndpZGdldF93b29jb21tZXJjZV9yYXRpbmdfZmlsdGVyIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6NzQ6ImE6Mjp7aToyO2E6MTp7czo1OiJ0aXRsZSI7czoxNDoiQXZlcmFnZSByYXRpbmciO31zOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6MzY7Tzo4OiJzdGRDbGFzcyI6NDp7czo5OiJvcHRpb25faWQiO3M6MzoiMjc1IjtzOjExOiJvcHRpb25fbmFtZSI7czozMzoid2lkZ2V0X3dvb2NvbW1lcmNlX3JlY2VudF9yZXZpZXdzIjtzOjEyOiJvcHRpb25fdmFsdWUiO3M6MzA6ImE6MTp7czoxMjoiX211bHRpd2lkZ2V0IjtpOjE7fSI7czo4OiJhdXRvbG9hZCI7czozOiJ5ZXMiO31pOjM3O086ODoic3RkQ2xhc3MiOjQ6e3M6OToib3B0aW9uX2lkIjtzOjM6IjI3MyI7czoxMToib3B0aW9uX25hbWUiO3M6NDM6IndpZGdldF93b29jb21tZXJjZV9yZWNlbnRseV92aWV3ZWRfcHJvZHVjdHMiO3M6MTI6Im9wdGlvbl92YWx1ZSI7czozMDoiYToxOntzOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6Mzg7Tzo4OiJzdGRDbGFzcyI6NDp7czo5OiJvcHRpb25faWQiO3M6MzoiMjc0IjtzOjExOiJvcHRpb25fbmFtZSI7czozNzoid2lkZ2V0X3dvb2NvbW1lcmNlX3RvcF9yYXRlZF9wcm9kdWN0cyI7czoxMjoib3B0aW9uX3ZhbHVlIjtzOjMwOiJhOjE6e3M6MTI6Il9tdWx0aXdpZGdldCI7aToxO30iO3M6ODoiYXV0b2xvYWQiO3M6MzoieWVzIjt9aTozOTtPOjg6InN0ZENsYXNzIjo0OntzOjk6Im9wdGlvbl9pZCI7czozOiIyNjUiO3M6MTE6Im9wdGlvbl9uYW1lIjtzOjMwOiJ3aWRnZXRfd29vY29tbWVyY2Vfd2lkZ2V0X2NhcnQiO3M6MTI6Im9wdGlvbl92YWx1ZSI7czozMDoiYToxOntzOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fWk6NDA7Tzo4OiJzdGRDbGFzcyI6NDp7czo5OiJvcHRpb25faWQiO3M6MzoiMzAwIjtzOjExOiJvcHRpb25fbmFtZSI7czoyOToid2lkZ2V0X3lpdGgtd29vY29tcGFyZS13aWRnZXQiO3M6MTI6Im9wdGlvbl92YWx1ZSI7czozMDoiYToxOntzOjEyOiJfbXVsdGl3aWRnZXQiO2k6MTt9IjtzOjg6ImF1dG9sb2FkIjtzOjM6InllcyI7fX0';
		$all_widgets_code = base64_decode($all_widgets_code);
	    $all_widgets_code = unserialize($all_widgets_code);
	    
		foreach ($all_widgets_code as $option) {
			$option_array = unserialize($option->option_value);
			$option_array = $this->recursive_array_replace('http://demo.themerelic.com/ostore', get_site_url().'/' , $option_array );
			update_option($option->option_name, $option_array);
		}
	}

	function set_theme_mods(){
    	$theme_modes_data = 'YTozOTp7aTowO2I6MDtzOjE4OiJjdXN0b21fY3NzX3Bvc3RfaWQiO2k6LTE7czoxODoibmF2X21lbnVfbG9jYXRpb25zIjthOjI6e3M6NjoibWVudS0xIjtpOjM0O3M6ODoidG9wX21lbnUiO2k6NTQ7fXM6MjQ6Im9zdG9yZV9wcm9fc2xpZGVyX2VuYWJsZSI7YjoxO3M6MjY6Im9zdG9yZV9wcm9fc2xpZGVyX2NhdGVnb3J5IjtzOjY6InNsaWRlciI7czoxNzoic2xpZGVyX3Bvc3RfY291bnQiO3M6MToiMiI7czoyODoib3N0b3JlX3Byb190b3BfaGVhZGVyX2VuYWJsZSI7YjoxO3M6Mjc6Im9zdG9yZV9wcm9fdG9wX2hlYWRlcl9lbWFpbCI7czoxOToidGhlbWVyZWxpY0BnbWFpbC5jbSI7czoyOToib3N0b3JlX3Byb190b3BfaGVhZGVyX2FkZHJlc3MiO3M6MTc6ImthdGhhbWFuZHUsIE5lcGFsIjtzOjMwOiJvc3RvcmVfcHJvX3RvcF9oZWFkZXJfcGhvbmVfbm8iO3M6MTU6Iis5NzctMTIzNDU2Nzg5MCI7czoyNjoib3N0b3JlX3Byb190b3BfaGVhZGVyX3RpbWUiO3M6ODoiMTBhbS01cG0iO3M6MjY6ImFyY2hpdmVfcGFnZV9sYXlvdXRfb3B0aW9uIjtzOjEzOiJyaWdodC1zaWRlYmFyIjtzOjM2OiJvc3RvcmVfcHJvX3NpbmdsZV9wYWdlX2xheW91dF9vcHRpb24iO3M6MTM6InJpZ2h0LXNpZGViYXIiO3M6Mjk6Im9zdG9yZV9wcm9fcGFnZV9sYXlvdXRfb3B0aW9uIjtzOjEzOiJyaWdodC1zaWRlYmFyIjtzOjE4OiJibG9nX2xheW91dF9vcHRpb24iO3M6MTQ6ImJsb2ctbGlzdC12aWV3IjtzOjMwOiJvc3RvcmVfcHJvX3NvY2lhbF9saW5rc19lbmFibGUiO2I6MTtzOjEyOiJmYWNlYm9va191cmwiO3M6MTY6Ind3dy5mYWNlYm9vay5jb20iO3M6MTE6Imdvb2dsZV9wbHVzIjtzOjE5OiJ3d3cuZ29vZ2xlLXBsdXMuY29tIjtzOjExOiJ0d2l0dGVyX3VybCI7czoxNToid3d3LnR3aXR0ZXIuY29tIjtzOjc6InJzc191cmwiO3M6MTA6Ind3dy5yc3MuY20iO3M6MTI6ImxpbmtlZGluX3VybCI7czoxNjoid3d3LmxpbmtlZGluLmNvbSI7czoxMzoiaW5zdGFncmFtX3VybCI7czoxNzoid3d3Lmluc3RhZ3JhbS5jb20iO3M6Mjg6Im9zdG9yZV9wcm9fYnRuX3NvY2lhbF9lbmFibGUiO2I6MTtzOjI3OiJvc3RvcmVfcHJvX3N1YnNjcmliZV9lbmFibGUiO2I6MTtzOjI1OiJvc3RvcmVfcHJvX3N1YnNjcmliZV9hcmVhIjtzOjIxOiJbbWM0d3BfZm9ybSBpZD0iMjk5Il0iO3M6MzM6Im9zdG9yZV9wcm9fc3Vic2NyaWJlX2hlYWRpbmdfdGV4dCI7czoyMjoiU2lnbiBVcCBGb3IgTmV3c2xldHRlciI7czozNjoib3N0b3JlX3Byb19zdWJzY3JpYmVfc2hvcnRfZGVzY19hcmVhIjtzOjM1OiJEdWlzIGF1dGVtIHZlbCBldW0gaXJpdXJlRHVpcyBhdXRlbSI7czoxNDoicGF5bWVudF9lbmFibGUiO2I6MTtzOjE2OiJwYXltZW50X2xvZ29fYWRkIjtzOjQxNToiaHR0cDovL2RlbW8udGhlbWVyZWxpYy5jb20vb3N0b3JlLXByby93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8xMC9hbGwtY2MtbG9nb3MxLnBuZyxodHRwOi8vZGVtby50aGVtZXJlbGljLmNvbS9vc3RvcmUtcHJvL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE3LzEwL2FsbC1jYy1sb2dvczIucG5nLGh0dHA6Ly9kZW1vLnRoZW1lcmVsaWMuY29tL29zdG9yZS1wcm8vd3AtY29udGVudC91cGxvYWRzLzIwMTcvMTAvYWxsLWNjLWxvZ29zMy5wbmcsaHR0cDovL2RlbW8udGhlbWVyZWxpYy5jb20vb3N0b3JlLXByby93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8xMC9hbGwtY2MtbG9nb3M1LnBuZyxodHRwOi8vZGVtby50aGVtZXJlbGljLmNvbS9vc3RvcmUtcHJvL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE3LzEwL2FsbC1jYy1sb2dvczYucG5nLCI7czoxNDoibG9nb19zbGlkZXJfb24iO2I6MTtzOjE0OiJsb2dvX3NsaWRlX2FkZCI7czo2OTM6Imh0dHA6Ly9kZW1vLnRoZW1lcmVsaWMuY29tL29zdG9yZS1wcm8vd3AtY29udGVudC91cGxvYWRzLzIwMTcvMTAvU0lERUFSTV9TdGFja2VkX0NNWUsucG5nLGh0dHA6Ly9kZW1vLnRoZW1lcmVsaWMuY29tL29zdG9yZS1wcm8vd3AtY29udGVudC91cGxvYWRzLzIwMTcvMTAvZHVyYWNsb3VkX2xvZ29fMTJpbi5wbmcsaHR0cDovL2RlbW8udGhlbWVyZWxpYy5jb20vb3N0b3JlLXByby93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8xMC9FWFAtRU1TX1NvZnR3YXJlX2xvZ29fcHJpbWFyeV94bC5wbmcsaHR0cDovL2RlbW8udGhlbWVyZWxpYy5jb20vb3N0b3JlLXByby93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8xMC9MT0dPLnBuZyxodHRwOi8vZGVtby50aGVtZXJlbGljLmNvbS9vc3RvcmUtcHJvL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE3LzEwL2xvZ29fY2F0YWxvZ2ljLnBuZyxodHRwOi8vZGVtby50aGVtZXJlbGljLmNvbS9vc3RvcmUtcHJvL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE3LzEwL01pY3Jvc29mdC5wbmcsaHR0cDovL2RlbW8udGhlbWVyZWxpYy5jb20vb3N0b3JlLXByby93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8xMC9zbm93c29mdHdhcmUtbG9nby5qcGcsaHR0cDovL2RlbW8udGhlbWVyZWxpYy5jb20vb3N0b3JlLXByby93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8xMC9TWVNQUk9fTG9nb19UTV9yZ2IucG5nLCI7czo1MToib3N0b3JlX3Byb19icmVhZGNydW1ic193b29jb21tZXJjZV9iYWNrZ3JvdW5kX2ltYWdlIjtzOjg4OiJodHRwOi8vZGVtby50aGVtZXJlbGljLmNvbS9vc3RvcmUtcHJvL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE3LzEwL3Blb3BsZS0xODM4NzU0XzE5MjAuanBnIjtzOjUxOiJvc3RvcmVfcHJvX2JyZWFkY3J1bWJzX25vcm1hbF9wYWdlX2JhY2tncm91bmRfaW1hZ2UiO3M6ODg6Imh0dHA6Ly9kZW1vLnRoZW1lcmVsaWMuY29tL29zdG9yZS1wcm8vd3AtY29udGVudC91cGxvYWRzLzIwMTcvMTAvcGVvcGxlLTE4Mzg3NTRfMTkyMC5qcGciO3M6MzM6Im9zdG9yZV9wcm9fc3Vic2NyaWJlX3B1cHVwX2VuYWJsZSI7YjoxO3M6MTE6ImN1c3RvbV9sb2dvIjtpOjI2Mzc7czoxNjoiYmFja2dyb3VuZF9pbWFnZSI7czowOiIiO3M6MTI6ImhlYWRlcl9pbWFnZSI7czoxMzoicmVtb3ZlLWhlYWRlciI7czoyMToib3N0b3JlX3Byb19wcm9faGVhZGVyIjtzOjEwOiJoZWFkZXItb25lIjtzOjMyOiJvc3RvcmVfcHJvX3Byb19wcmVsb2FkZXJfb3B0aW9ucyI7YjowO30';
        $import_code = base64_decode($theme_modes_data);
        $import_code = unserialize($import_code);
        $import_code = $this->recursive_array_replace('http://demo.themerelic.com/ostore', get_site_url().'/' , $import_code );
        update_option('theme_mods_ostore-pro', $import_code);
    }

	function set_menu() {		
		global $wpdb;
		$table_db_name = $wpdb->prefix . "terms";
		$rows = $wpdb->get_results("SELECT * FROM $table_db_name WHERE name='main menu'", ARRAY_A);
        $menu_ids = array();

		foreach($rows as $row) {
			$menu_ids[$row["name"]] = $row["term_id"] ;
		}

    	set_theme_mod( 'nav_menu_locations', array_map( 'absint', array( 'primary' =>$menu_ids['main menu'] ) ) );

	} 

	function recursive_array_replace($find, $replace, $array){
		$newArray = array();
		foreach ($array as $key => $value) {
			if (!is_array($value)) {
				$newArray[$key] = str_replace($find, $replace, $value);			
			}else{
				$newArray[$key] = $this->recursive_array_replace($find, $replace, $value);
			}
		}
		return $newArray;
	}
}

