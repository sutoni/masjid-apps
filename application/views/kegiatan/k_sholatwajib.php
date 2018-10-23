
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>var base_url = "<?=base_url();?>";</script>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Import
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-striped col-sm-12">
                    <thead>
                        <tr>
                            <td>Tanggal</td>
                            <td>Kategori</td>
                            <td>Waktu Sholat</td>
                            <td>Muadzin</td>
                            <td>Imam</td>
                            <td>Penceramah</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach((array)$data as $data): ?>
                            <tr>
                                <td><?= $data['tanggal']?></td>
                                <td><?= $data['kategori']?></td>
                                <td><?= $data['namasholat']?></td>
                                <td><?= $data['muadzin']?></td>
                                <td><?= $data['imam']?></td>
                                <td><?= $data['penceramah']?></td>
                                <td><?= $data['status']?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" id="import-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel">Import CSV File to Database</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="custom-file col-xs-12">
                                <input type="file" id="file" class="custom-file-input" name="file" placeholder="Choose file">
                                <span class="custom-file-control" data-attr="Choose file..."></span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-outline-success float-xs-right" data-loading="processing...">Import to DB</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script><!-- Tether for Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('input[name="file"]').on('change',function(e){
                var filename = document.getElementById("file").files[0].name;
                $(this).next().attr('data-attr',filename);
            })
            $('#import-form').on('submit',function(e){
                e.preventDefault();
                var $btn = $(this).find('button[type="submit"]');
                var formdata = new FormData(this);
                $.ajax({
                    url: base_url+'kegiatan/import',
                    type: 'POST',
                    dataType: 'JSON',
                    data:formdata,
                    cache:false,
                    contentType: false,
                    processData: false,
                    beforeSend:function(){
                        $btn.button('loading');
                    },
                    success:function(response){
                        $('.form-group.has-error').removeClass('has-error').find('span.text-danger').remove();
                        switch(response.status){
                            case 'form-incomplete':
                                $.each(response.errors, function(key,val){
                                    if(val.error!=''){
                                        $(val.field).closest('.form-group').addClass('has-error').append(val.error);
                                    }
                                })
                            break;
                            case 'success':
                                window.location.reload(true);
                            break;
                            case 'error':
                                console.log(response.message);
                            break;
                        }
                    },
                    error: function(jqXHR,textStatus,error){
                        console.log('Unable to send request!');
                    }
                }).always(function(){
                    $btn.button('reset');
                });
            })
        })
    </script>
