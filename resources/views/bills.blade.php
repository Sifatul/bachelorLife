<?php
/**
 * Created by PhpStorm.
 * User: sifat
 * Date: 28-Jul-18
 * Time: 6:54 PM
 */
?>
@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('includes.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h3 class="pt-2">Daily Expenses </h3>
                <p> Save Your Daily Expenses</p>
                <hr>
                <form class="pt-2" action="{{route('newWallet')}}" method="post">
                    @foreach($errors->all() as $error)
                        <div class="form-row">
                            <div class="alert alert-danger" role="alert">
                                {{$error}}
                            </div>
                        </div>
                    @endforeach
                    @foreach($all_cat as $cat)
                        <div class="form-row">
                            <div class="form-group row col-md-12 ">
                                <div class="col-md-4">
                                    <label for="inputEmail3"
                                           class="col-sm-4 col-form-label h1 fa-w-6">{{$cat->cat_name}}</label>
                                </div>
                                <div class="col-md-5">

                                    <input type="number"
                                           class=" form-control {{$errors->has($cat->cat_name)?'is-invalid':''}}"
                                           id="inputEmail3" name="{{$cat->cat_slug}}"
                                           value="{{Request::old($cat->cat_slug) }}"
                                           placeholder=" i.e 2000">
                                </div>

                            </div>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">Save</button>
                    @csrf
                </form>
            </main>
        </div>
    </div>

@endsection
