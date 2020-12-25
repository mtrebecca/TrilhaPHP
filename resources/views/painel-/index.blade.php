@extends('template.painel-recep')
@section('title', 'Painel Recepção')
@section('content')
<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] != 'recep'){ 
  echo "<script language='javascript'> window.location='./' </script>";
}
?>
Home do recep
@endsection