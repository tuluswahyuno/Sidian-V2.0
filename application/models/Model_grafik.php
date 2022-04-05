<?php 

class Model_grafik extends CI_Model{
   
  function statistik_surat()
 {
  
  $sql= $this->db->query("
  
  select 
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='2')),0) AS `II/a`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='3')),0) AS `II/b`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='4')),0) AS `II/c`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='5')),0) AS `II/d`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='6')),0) AS `III/a`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='7')),0) AS `III/b`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='8')),0) AS `III/c`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='9')),0) AS `III/d`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='10')),0) AS `IV/a`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='11')),0) AS `IV/b`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='12')),0) AS `IV/c`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='13')),0) AS `IV/d`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (pangkat='14')),0) AS `IV/e`
  from data_pegawai 
  GROUP BY grafik; 
  
  ");
  
  return $sql;
 }
 
 

 function statistik_jenis()
 {
  
  $sql= $this->db->query("

  select 
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (gender='Laki-laki')),0) AS `Laki-laki`,
  ifnull ((SELECT count(id_user) FROM (data_pegawai) WHERE (gender='Perempuan')),0) AS `Perempuan`
  from data_pegawai
  GROUP BY grafik;
  
  ");
  
  return $sql;
 } 




}


 ?>