@extends('layouts.pesanview')
@section('content')
<!-- =========================================================== -->
<div class="row">


    @if ($cek === 'user')
    <div class="col-sm">
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
                                    <!-- Message. Default to the left -->
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left"></span>
                                            <span class="direct-chat-timestamp pull-right"></span>
                                        </div>
                                        <!-- /.direct-chat-info -->


                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right"></span>
                                            <span class="direct-chat-timestamp pull-left"></span>
                                        </div>
                                        <!-- /.direct-chat-info -->

                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                </div>
                                <!--/.direct-chat-messages-->


                                <!-- /.direct-chat-pane -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <form action="" enctype="multipart/form-data" method="post">

                                    <div class="input-group">
                                        <input type="text" name="isi_pesan" placeholder="Type Message ..." class="form-control" required>
                                        <input type="hidden" name="id_penerima" value="" />
                                        <span class="input-group-btn">
                                            <button disabled type="submit" class="btn btn-primary btn-flat">Send</button>
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
        @endif
    </div>



    @stop