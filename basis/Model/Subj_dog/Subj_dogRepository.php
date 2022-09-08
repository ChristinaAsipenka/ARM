<?php

namespace Basis\Model\Subj_dog;

use Engine\Model;

class subj_dogRepository extends Model
{

    public function getSubj_dog()
    {
        $sql = $this->queryBuilder->select()
            ->from('subj_dog')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	public function getSubj_dogById($id)
    {
			$sql = $this->queryBuilder->select('subj_dog.id, subj_dog.id_subject, subj_dog.name, subj_dog.number, subj_dog.date_dog')
            ->from('subj_dog')
			//->joinLeftTable('spr_ot_type_to','spr_ot_type_to.id = obj_ot_tepl_kot.teploobm')
            ->where('id_subject', $id)
            ->sql();

		return $this->db->query($sql, $this->queryBuilder->values);
    }


    public function getSubj_dogData($id)
    {
        $subj_dog = new Subj_dog($id);

        return $subj_dog->findOne();
    }



	public function updateSubj_dogInfo($params)
    {
      
	   if (isset($params['id'])) {
            $subj_dog = new Subj_dog($params['id']);
			
				if(strlen($params['name'])>0){
					$subj_dog->setName($params['name']);
				}
				if(strlen($params['number'])>0){
					$subj_dog->setNumber($params['number']);
				}			
				if(strlen($params['id_subject'])>0){
					$subj_dog->setId_subject($params['id_subject']);
				}				
				if(strlen($params['date_dog'])>0){
					$subj_dog->setDate_dog($params['date_dog']);
				}	
		
				
			$subj_dogId = $subj_dog->save();

      return $params['id'];
        }
		
    }




    public function createSubj_dog($params)
    {

		$subj_dog = new Subj_dog;
		
		
		if(strlen($params['name'])>0){
			$subj_dog->setName($params['name']);
		}
		if(strlen($params['number'])>0){
			$subj_dog->setNumber($params['number']);
		}
		if($params['id_subject'] != 'undefined'){
			if(strlen($params['id_subject'])>0){
				$subj_dog->setId_subject($params['id_subject']);
			}
		}			
		if(strlen($params['date_dog'])>0){
			$subj_dog->setDate_dog($params['date_dog']);
		}	

			
			$subj_dogId = $subj_dog->save();
		
		
        return $subj_dogId;
    }


    public function updateSubj_dog($params)
    {

//print_r($params);		
        if (isset($params['id_subj_dog'])) {
            $subj_dog = new Subj_dog($params['id_subj_dog']);

			$subj_dog->setId_subject($params['id_subject']);
		
            $subj_dog->save();
        }
    }
/// Удаляем автономные источники электроснабжения который не имеет id объекта	
	public function deleteSubj_dog_empty_object_id($id)
    {

		$sql = $this->queryBuilder->delete()
				->from('subj_dog')
				->where('id', $id)
				->whereIsNull('id_subject')
				->sql();

		$this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('subj_dog')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByObj($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('subj_dog')
            ->where('id_subject', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function removeItemsByTab($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('subj_dog')
            ->where('id_table', 'subj_dog-'.$itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
}