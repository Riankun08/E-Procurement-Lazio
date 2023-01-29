<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin &mdash; @yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/fontawesome/css/all.min.css')}}">
  <link rel="shortcut icon" href="{{asset('template/base-admin/dist/assets/img/logo-naira-object.png')}}" type="image/x-icon"/>

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/base-admin/dist/assets/modules/summernote/summernote-bs4.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('template/base-admin/dist/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('template/base-admin/dist/assets/css/components.css')}}">

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>
