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
		<div id="MainContent_DescriptionCategory" class="Description">
			<div class="panel panel-primary" style="border: 0px;">
				<div class="panel-heading">
					<h3 class="panel-title">
                        CÔNG NGHỆ THÔNG TIN
					</h3>
				</div>
				<div class="panel-body text-justify">
					<div style="width: 100%;">
						<div style="float: left; min-width: 32%; padding-right: 10px;">
							<img src="{{asset('images/icons/ListDocument.png')}}" alt="Chia sẽ tài liệu công nghệ thông tin" />
						</div>
						<div>
							<span style="text-align: justify !important; line-height: 1.7;">
                                Công nghệ thông tin là tập hợp các phương pháp khoa học, phương tiện và công cụ kỹ thuật hiện đại nhằm tổ chức khai thác và sử dụng có hiệu quả các nguồn tài nguyên thông tin rất phong phú và tiềm năng trong mọi lĩnh vực hoạt động của con người và xã hội. Ngành Công nghệ thông tin được đông đảo mọi người quan tâm và công nghệ thông tin trở nên ngày càng gần gũi với con người. Tổng hợp nguồn tài liệu, sách, giáo trình, bài giảng và câu hỏi liên quan đến lĩnh vực Công Nghệ Thông Tin như: Phần cứng, Phần mềm, Hệ điều hành, Quản trị mạng/Hệ thống, Quản trị Web, Quản trị CSDL, Kỹ thuật lập trình, An ninh & Bảo mật, Hướng dẫn và thủ thuật máy tính, Tin học văn phòng,... Thư viện đề thi công nghệ thông tin từ tin học văn phòng đến chứng các chỉ quốc tế Microsoft, Cisco, Oracle... luôn được cập nhật.
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- document newest -->
		<div id="MainContent_NewestDocuments" class="newestDocuments container">
			<h1 style="color: #1babe2; font-size: 20px !important; margin-left: -15px !important; margin-bottom: 10px !important;">Tài liệu mới nhất</h1>
			<div class="row">
			@foreach($newest_documents as $item_newest_document)
				<div class="col-md-4 col-xs-4 col-thin">
					<div class="NewDocument" title='{{$item_newest_document->title}}'>
						<a href='{{URL::to("/")}}/document/{{$item_newest_document->id}}'>
							<img src='uploads/{{$item_newest_document->file_name}}.png' style="display: inline-block; width: 100%; height: 190px;" alt='{{$item_newest_document->title}}'>
							<div class="detailDocument">
								{{$item_newest_document->title}}
							</div>
						</a>
					</div>
				</div>
			@endforeach
			</div>
		</div>
		<!-- document list item -->
		<div id="MainContent_ListDocuments" class="listDocuments container">
			<div class="row" style="border-bottom: 1px dashed #CCC; margin-top: 10px; padding-bottom: 10px;">
				Kết quả 1-10 trong {{$count_documents_of_category}}
			</div>
			<div class="row">
				<div class="text-center">
					<!-- <ul class="pagination"> -->
					{{$pagination_all_documents->render()}}
					<!-- </ul> -->
				</div>
			</div>
			@foreach($pagination_all_documents as $item_document)
			<div class="row documentItem">
				<div class="col-md-3 col-xs-3 col-thin">
					<a href='{{URL::to("/")}}/document/{{$item_document->id}}' class="img"><img class="img-thumbnail" style="width: 140px; height: 150px" title='{{$item_document->title}}' alt='{{$item_document->title}}' src="{{asset('uploads/'.$item_document->file_name.'.png')}}"></a>
				</div>
				<div class="col-md-9 col-xs-9 col-thin">
					<div>
						<a class="list_title" href='{{URL::to("/")}}/document/{{$item_document->id}}'>{{$item_document->title}}</a>
					</div>
						<div class="moreInformation">
							<div class="list_size"><span class="title_list_moreInformation">Dung lượng: </span>{{Convert::formatBytes($item_document->size)}}</div>
							<div class="list_type"><span class="title_list_moreInformation">Kiểu file: </span>{{$item_document->type}}</div>
							<div class="list_viewcount"><span class="title_list_moreInformation">Lượt xem: </span>{{$item_document->view_count}}</div>
							<div class="list_downloadcount"><span class="title_list_moreInformation">Lượt tải: </span>{{$item_document->dowload_count}}</div>
					  	</div>
				<div class='list_description'>
					<span style="color: #0096d6;"></span>{{$item_document->description}}.
				</div>
				<div  class="list_category" >Mục: <a href='{{URL::to("/")}}/category/{{$item_document->category->id}}'>{{$item_document->category->name}}</a></div>
			   </div>
			</div>
			@endforeach
            <div class="row">
				<div class="text-center">
					<!-- <ul class="pagination"> -->
					{{$pagination_all_documents->render()}}
					<!-- </ul> -->
				</div>
			</div>
		</div>
	</div>
@endsection
