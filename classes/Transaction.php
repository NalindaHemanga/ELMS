<?php


class Transaction{


public static function getHistory($value){

	$sql="SELECT item_name,borrowed_date,returned_date,transaction_comment FROM item,item_transaction,transaction,member,item_copy WHERE member_nic='".$value."' AND member.member_id=transaction.member_id AND item_transaction.transaction_id=transaction.transaction_id AND item.item_id=item_copy.item_id AND item_transaction.item_copy_id=item_copy.item_copy_id";
	return DB::getInstance()->directSelect($sql);


}








}


?>