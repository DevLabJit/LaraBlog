<x-master>
    <x-slot name="tab_title">

    	ADD CATEGORY

    </x-slot>

    <x-slot name="styles">

    	<!-- Material Icons-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Bootstrap CSS -->
		{{-- <link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
   		<link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css"> --}}
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">


	</x-slot>
  	


    	<x-slot name="heading">

    		ADD NEW CATEGORY

    	</x-slot>


       {{--  <x-slot name="icon_listList">
    		
    		<span class="material-symbols-outlined">
				list_alt
			</span>

    	</x-slot> --}}


    	<x-form_create_category>

    	
			<x-slot name="btn_action_add_category">
				<span class="align-bottom material-icons">add</span>add category
			</x-slot>
    		
    	</x-form_create_category>


    	<x-slot name="txt_btn">

            <a class="fw-bolder outline-none font-monospace text-uppercase btn btn-info btn-sm rounded-0 text-light" href="{{ route('categories.index') }}">
                <span class="p-1 align-middle material-icons">list_alt</span>view list
            </a>
        
        </x-slot>






</x-master>

