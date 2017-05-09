<?php use App\Components\Convert; ?>
@extends('user.layouts.app')

@section('sidebar')
    <div class="panel panel-primary" style="border: 0px; margin-bottom: 0px;">
    <div class="panel-heading">
            <h3 class="panel-title">DANH MỤC TÀI LIỆU</h3>
    </div>
    </div>
    <div class="content">
        <ul id="nav-sidebox" class="category-items">
            @foreach($categories as $category)
            <li class="level0 subcatemenu"><a href="{{URL::to('/')}}/category/{{$category->id}}">{{$category->name}}<span class="myBadge">{{$category->document_count}}</span></a>
            @endforeach
            </li>
        </ul>
    </div>
@endsection
@section('content')
	<div class="col-md-7 col-xs-7 col-thin">
		<div class="Description">
			<div class="panel panel-primary" style="border: 0px;">
				<div class="panel-heading">
					<h3 class="panel-title">
						{{$document->category->name}}
					</h3>
				</div>
				<div class="panel-body text-justify">
					<div style="width: 100%;">
						<div style="float: left; min-width: 32%; padding-right: 10px;">
							<img src="{{asset('images/icons/ListDocument.png')}}" alt="" />
						</div>
						<div>
							<span style="text-align: justify !important; line-height: 1.7;">
								{{$document->category->description}}
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- detail - information - document -->
		<div class="container detailInformation">
			<div class="row" style='border-bottom: 1px dashed #CCC; margin-bottom: 10px; padding-bottom: 10px; color: #6d6e71;'>
				<div class="col-md-3 col-xs-3 no-padding">
					<a href="{{URL::to('/')}}/document/{{$document->id}}" class="imageThumnail">
						<img class="img-thumbnail image-of-thumnail" alt="Phần mềm cần thiết cho máy tính" title="Phần mềm cần thiết cho máy tính" src="{{asset('uploads/'.$document->file_name.'.png')}}">
					</a>
				</div>
				<div class="col-md-9 col-xs-9 detail-padding-left-thumnail" style="padding-left: 0px;">
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<h1 style="font-size: 21px !important; line-height: 1.3; text-align: justify;">
								{{$document->title}}
							</h1>
							<div class="moreInformation">
								<div class="list_size">
									<span class="title_list_moreInformation">Dung lượng:</span>
									<span id="MainContent_lblSize">{{$document->size}}</span>
								</div>
								<div class="list_type">
									<span class="title_list_moreInformation">Kiểu file:</span>
									<span id="MainContent_lblType">{{$document->type}}</span>
								</div>
								<div class="list_viewcount">
									<span class="title_list_moreInformation">Lượt xem:</span>
									<span id="MainContent_lblViewCount">{{$document->view_count}}</span>
								</div>
								<div class="list_downloadcount">
									<span class="title_list_moreInformation">Lượt tải:</span>
									<span id="MainContent_lblDownloadCount">{{$document->dowload_count}}</span>
								</div>
							</div>
							<div style="text-align: justify; padding-bottom: 10px;">
								<span class="descriptionDocument">
									{{$document->description}}
								</span>
							</div>
							Mục: <a href="{{URL::to('/')}}/document/{{$document->id}}">{{$document->category->name}}</a>
							<!-- <a href="mailto:?subject=Phần Mềm Cần Thiết Cho Máy Tính&amp;Body=http://www.khoaluan.vn/tai-lieu_phan-mem-can-thiet-cho-may-tinh_1053194" target="_blank"><img alt="E-mail - " src="http://i1.code.msdn.s-msft.com/content/common/sharethis/email.gif"></a><a href="http://twitter.com/home?status=Phần Mềm Cần Thiết Cho Máy Tính : http://www.khoaluan.vn/tai-lieu_phan-mem-can-thiet-cho-may-tinh_1053194" target="_blank"> <img alt="Twitter - Khoaluan.vn - Thư viện tài liệu số trực tuyến" src="http://i1.code.msdn.s-msft.com/content/common/sharethis/twitter.gif"></a><a href="http://www.facebook.com/sharer.php?u=http://www.khoaluan.vn/tai-lieu_phan-mem-can-thiet-cho-may-tinh_1053194&amp;t=Phần Mềm Cần Thiết Cho Máy Tính" target="_blank"><img alt="Facebook - Khoaluan.vn - Thư viện tài liệu số trực tuyến" src="http://i1.code.msdn.s-msft.com/content/common/sharethis/facebook.gif"></a><a href="https://plus.google.com/share?url=http://www.khoaluan.vn/tai-lieu_phan-mem-can-thiet-cho-may-tinh_1053194" target="_blank"> <img alt="Google - Khoaluan.vn - Thư viện tài liệu số trực tuyến" src="st.f1.vnecdn.net/responsive/i/v11/graphics/icon_google.gif"></a> -->
						</div>
					</div>
				</div>
			</div>
			<!-- save - dowload document -->
			<div id="MainContent_UpdatePanel1">

				<div class="row" style="padding-bottom: 10px;">
					<div class="col-md-5 col-xs-5 no-padding">
						<p class="btn-block help-block" style="color: red; font-weight: bolder; font-size: 12px;">
							Vui lòng tải xuống để xem tài liệu đầy đủ.
						</p>
					</div>
					<div class="col-md-7 col-xs-7 text-right no-padding">
						<a onclick="return ConfirmOnSave();" id="MainContent_linkSave" class="btn btn-default btn-success" href="javascript:__doPostBack(&#39;ctl00$MainContent$linkSave&#39;,&#39;&#39;)">
								<span style="font-size: 14px" class="glyphicon glyphicon-plus-sign"></span> Đánh dấu
						</a>
						
						<a onclick="return ConfirmOnDownload();" id="MainContent_linkDownload" class="btn btn-default btn-primary" href="javascript:__doPostBack(&#39;ctl00$MainContent$linkDownload&#39;,&#39;&#39;)">
								<span style="font-size: 14px" class="glyphicon glyphicon-save"></span> Tải tài liệu
						</a>
					</div>
				</div>
			</div>

			<!-- view demo document -->
			<div class="row">
				<iframe id="iframe" class='col-md-12 col-xs-12 no-padding' frameborder='0' src='' height='1200px' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <div style='float:left; width: 100%; margin: 0px; background:#3d3d3d;height: 20px;margin-bottom: 10px;'></div>
			</div>

            <input type="hidden" name="MainContent_IsAuthenticated" id="MainContent_IsAuthenticated" />

			<div class="row panel panel-primary" style="border: 0px; padding-top: 5px">
				<div class="panel-heading">
					<h3 class="panel-title">CÓ THỂ BẠN QUAN TÂM
					</h3>
				</div>
				<div class="panel-body text-justify" style="padding: 0 15px 0 15px;">
					<div style="width: 100%;">
						<div class="relatedDocument">
							<div class="row">
								@foreach($related_documents as $item_related)
								<div class="col-md-12 col-xs-12 no-padding documentItem">
									<a href="{{URL::to('/')}}/document/{{$item_related->id}}" title="{{$item_related->title}}">
										<div class="col-md-2 col-xs-3 col-thin">
											<img style="width: 96px; height: 100px; border: 1px solid #ddd;" class="img-responsive" src="{{asset('uploads/'.$item_related->file_name.'.png')}}" alt='{{$item_related->title}}'>
										</div>
										<div class="col-md-10 col-xs-9 col-thin" style="padding-top: 0px;">
											<h1 style="font-size: 13px !important; color: #333; line-height: 1.4; text-transform: capitalize; text-align: justify;">{{$item_related->title}}</h1>
											<div class="moreInformation">
												<div class="list_size">
													<span class="title_list_moreInformation">Dung lượng:</span>{{$item_related->size}}
												</div>
												<div class="list_type">
													<span class="title_list_moreInformation">Kiểu file:</span>{{$item_related->type}}
												</div>
												<div class="list_viewcount">
													<span class="title_list_moreInformation">Lượt xem:</span>{{$item_related->view_count}}
												</div>
												<div class="list_downloadcount">
													<span class="title_list_moreInformation">Lượt tải:</span>{{$item_related->dowload_count}}
												</div>
											</div>
										</div>
									</a>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#iframe').attr('src',{!! "'". $file_path . "'" !!});
        });
        function ConfirmOnDownload() {
            document.getElementById("MainContent_IsAuthenticated").setAttribute('value','{{$user_token}}');
			var isAuthenticated = $('#MainContent_IsAuthenticated').val();
			if (isAuthenticated == '' || isAuthenticated == null) {
                if(confirm('Bạn phải đăng nhập trước khi thực hiện tải tài liệu này.') == true){
                    window.location = "{{URL::to('/')}}/login";
                    return false;
                }
			}
			else {
				window.location = "{{URL::to('/')}}/download-document/{{$item_related->id}}";
			}
		}
    </script>
@endsection