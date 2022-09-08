<?php

namespace Basis\Model\User;

use Engine\Model;

class UserRepository extends Model
{
    public function getUsers()
    {
        $sql = $this->queryBuilder->select()
            ->from('users')
			->where('is_spr', 1)
            ->orderBy('fio', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getUserById($id)
    {
        $user = new User($id);
        return $user->findOne();
    }
   	
/********** в одну функцию  ****************/
	public function getUserElektroId($id)
    {
        $user = new User($id);
        return $user->findOne();
    }
	public function getUserTeploId($id)
    {
        $user = new User($id);
        return $user->findOne();
    }
	public function getUserGazId($id)
    {
        $user = new User($id);
        return $user->findOne();
    }
	public function getUserTiId($id)
    {
        $user = new User($id);
        return $user->findOne();
    }	
/*********************************************/	
/********** в одну функцию  ****************/
	public function getUsersGaz()
    {
        $sql = $this->queryBuilder->select()
            ->from('users')
			->joinLeftTable('rules', 'rules', 'users.id = rules.id_user')
			->where('rules.arm_gruppa', 2)
			->where('is_spr', 1)
            ->orderBy('fio', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

	public function getUsersTeplo()
    {
        $sql = $this->queryBuilder->select()
            ->from('users')
			->joinLeftTable('rules', 'rules', 'users.id = rules.id_user')
			->where('rules.arm_gruppa', 1)
			->where('is_spr', 1)
            ->orderBy('fio', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }	
 public function getUsersElektro()
    {
        $sql = $this->queryBuilder->select()
            ->from('users')
			->joinLeftTable('rules', 'rules', 'users.id = rules.id_user')
			->where('rules.arm_gruppa', 3)
			->where('is_spr', 1)
            ->orderBy('fio', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
public function getUsersByPodrazd($podrazd, $otd)
    {
        $sql = $this->queryBuilder->select('users.id, users.filter_spr, users.fio, users.login, users.password, users.name, users.fam, users.otch, users.dolgnost, users.prioritet, users.spr_cod_otd, users.spr_cod_podrazd, users.podrazdelenie, users.photo, users.email, users.phone, users.mobile_phone, users.ip_phone, users.ip_phone_otd, users.rup_phone, users.branch_phone, users.is_spr, users.tab_num, users.date_reg, users.date_unreg, users.hash, rules.id as rules_id')
            ->from('users')
			->joinLeftTable('rules', 'users.id = rules.id_user')
			->where('rules.arm_gruppa', $otd)
			->where('spr_cod_podrazd', $podrazd)
			->where('is_spr', 1)
            ->orderBy('fio', 'ASC')
            ->sql();
//echo $sql; 
        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
public function getUsersByOtdel($otdel)
    {
        $sql = $this->queryBuilder->select('users.id, users.fio, rules.arm_gruppa, users.spr_cod_otd')
            ->from('users')
			->joinLeftTable('rules', 'users.id = rules.id_user')
			->where('spr_cod_otd', $otdel)
			->where('is_spr', 1)
            ->orderBy('fam', 'ASC')
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }	
/*********************************************/	
    public function test()
    {
		
		$user = new User;
        $user->setEmail('barzov.vs@gosenergogaznadzor.by');
        $user->setPassword(md5(rand(1, 10)));
        $user->setHash('new');
        $user->save();
		
		
    }
}