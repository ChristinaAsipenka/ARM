<?php

namespace Basis\Model\Spr_ot_uzel_block;

use Engine\Model;

class spr_ot_uzel_blockRepository extends Model
{

    public function getSpr_ot_uzel_block()
    {
        $sql = $this->queryBuilder->select()
            ->from('spr_ot_uzel_block')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getSpr_ot_uzel_blockData($id)
    {
        $spr_ot_uzel_block = new Spr_ot_uzel_block($id);

        return $spr_ot_uzel_block->findOne();
    }


    public function createSpr_ot_uzel_block($params)
    {
        $spr_ot_uzel_block = new Spr_ot_uzel_block;
        $spr_ot_uzel_block->setName($params['name']);
		$spr_ot_uzel_block->setName_razdel($params['podrazdel_table']);
		$spr_ot_uzel_blockId = $spr_ot_uzel_block->save();

        return $spr_ot_uzel_blockId;
    }


    public function updateSpr_ot_uzel_block($params)
    {
        if (isset($params['id'])) {
            $spr_ot_uzel_block = new Spr_ot_uzel_block($params['id']);
			$spr_ot_uzel_block->setName($params['name']);
			$spr_ot_uzel_block->setName_razdel($params['podrazdel_table']);
            $spr_ot_uzel_block->save();
        }
    }

    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('spr_ot_uzel_block')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	
}