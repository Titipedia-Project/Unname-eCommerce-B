@extends('layouts.fullview')
@section('content')
<!-- =========================================================== -->
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User</h5>

            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Chatting</h5>
                <!-- Direct Chat -->
                <div class="row">
                    <div class="container">
                        <!-- DIRECT CHAT PRIMARY -->
                        <div class="box box-primary direct-chat direct-chat-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Direct Chat</h3>

                                <div class="box-tools pull-right">

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    @foreach($pesan as $data)
                                    <!-- Message. Default to the left -->
                                    @if ($data->id_pengirim === Auth::user()->id)
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left"><?= $user1->first()->name; ?></span>
                                            <span class="direct-chat-timestamp pull-right">{{$data->waktu_kirim}}</span>
                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="{{ asset('photo_profile/'.Auth::user()->foto)}}" alt="Message User Image"><!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            {{$data->isi_pesan}}
                                        </div>

                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                    @else
                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right"><?= $user2->first()->name; ?></span>
                                            <span class="direct-chat-timestamp pull-left">{{$data->waktu_kirim}}</span>
                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="{{ asset('photo_profile/'.Auth::user()->foto)}}" alt="Message User Image"><!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            {{$data->isi_pesan}}
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    @endif
                                    <!-- /.direct-chat-msg -->
                                    @endforeach
                                </div>
                                <!--/.direct-chat-messages-->


                                <!-- /.direct-chat-pane -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <form action="/kirim" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="isi_pesan" placeholder="Type Message ..." class="form-control" required>
                                        <input type="hidden" name="id_penerima" value="{{$user2->first()->id}}" />
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary btn-flat">Send</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box-footer-->
                        </div>
                        <!--/.direct-chat -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>



    @stop