<?php 

$config= [
   'addarticlerules'=>[
						['field'=>'title',
						 'label'=>'title',
						 'rules'=>'required|alphadash'],
					    ['field'=>'body',
						 'label'=>'body',
						 'rules'=>'required|alphadash']
					  ],
	'adminlogin'=>[
						['field'=>'username',
						 'label'=>'username',
						 'rules'=>'required|alphadash|trim'],
					    ['field'=>'password',
						 'label'=>'password',
						 'rules'=>'required']
				  ]



];