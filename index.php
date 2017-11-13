<?php


require './model/model.php';

do_delete();

do_edit();

do_creation();

try{
  $get_select = do_select();
  require './view/view.php';
}
catch (Exception $e) {
  $msg_erreur = $e->getMessage();
  require 'errorView.php';

}
require 'template.php';
