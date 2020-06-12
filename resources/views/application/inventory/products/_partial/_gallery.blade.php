<?php
$widthLabel = 2;
$widthValue = 10;
?>
    
<div class="card-body">
        
            
            <div class="form-group row">
                <label class="col-md-{{$widthLabel}} col-form-label">Producto:</label>
                <div class="col-md-{{ $widthValue  }}">
                    <p class="form-control-static">{{ $product->uni_code. ' - ' . $product->name  }}</p>
                </div>
            </div>

            <hr />
            <form id="uploadProductImageForm" name="uploadProductImageForm" method="POST" 
                    prevalidation="{{ route('upload_productimg_pre_validation') }}" 
                    action="{{ route('upload_product_image') }}" 
                    enctype="multipart/form-data"
                    class="ajaxJsonForm" >

                @csrf
                <input type="hidden" id="product_id" name="product_id" value="{{ $product->product_id }}">

                <div class="form-group">        
                    <label for="new_image">Nueva Imagen:</label>                
                    <input type="file" class="form-control @error('new_image') is-invalid @enderror" id="new_image" name="new_image" >                    
                    <div id="new_image_help_block" class="invalid-feedback">{{ $errors->first('new_image') }}</div>
                </div>                
                
                <div class="form-group form-actions">
                <button class="btn btn-primary pre-validate-btn" type="button">
                    <i class="fa fa-save"></i> Subir Imagen</button>
                </div>
            </form>

            <hr />

            <div style="height: 20px;" ></div>

            <div class="row row-content align-items-center">                
                <div class="col-sm col-md flex-first">

                    @foreach ($product->product_images as $image)
                        <form 
                        method="POST"                         
                        action="{{ route('delete_product_image') }}" 
                        class="ajaxJsonForm">
                            <input type="hidden" id="product_id" name="product_id" value="{{ $product->product_id }}">
                            <input type="hidden" id="productimage_id" name="productimage_id" value="{{ $image->productimage_id }}">
                            <input type="hidden" id="src" name="src" value="{{ $image->src }}">
                            @csrf

                            <div class="media">                
                                <img 
                                    class="d-flex mr-3 img-thumbnail align-self-center" 
                                    src="{{asset( $image->url() ) }}" 
                                    alt="uthapizza" width="180" >
                                <div class="media-body">                                                        
                                    <p class="card-text">
                                        <!--<b>Archivo:</b> {{$image['name']}} <br/>-->
                                        <b>Tamaño:</b> {{ $image->size_kb.' kb' }} <br />
                                        <b>Dimensiones:</b> {{ $image->width.' x '.$image->height }} <br />                                        
                                    </p>

                                    <div class="form-group form-actions">
                                        <button class="btn btn-primary pre-validate-btn" type="button">
                                            <i class="fa fa-trash-o"></i> Eliminar Imagen</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>

            <div class="row">                

               

            </div>
    
</div>




 


