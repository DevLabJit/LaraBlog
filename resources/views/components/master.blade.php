<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $tab_title ?? 'Blog Management' }}</title>



        <!-- Fonts -->


        <!-- Styles -->


        {{ $styles ?? 'no style found' }}


    </head>
    <body>


    	<div class="container-lg mt-3">


    		<div class="d-flex align-items-center justify-content-between align-content-center border-bottom-2 border-light shadow-sm p-3 mb-5 bg-dark bg-gradient rounded text-light">
    			
	    		<h1 class="text-uppercase display-6">

	    			{{ $heading ?? 'no heading found' }}
	    		
	    		</h1>

                

	    		{{ $app_menu }}

	    			{{-- {{ $icon_listList ?? 'no icon found' }} --}}


    			

    		</div>

            {{ Breadcrumbs::render() }}

    		<div class="d-flex align-items-center align-content-center justify-content-between border-bottom-5 p-2 mb-2 bg-primary bg-gradient text-light">
    			
   					{{ $counter ?? 'no counter found' }}
    			
    				{{ $txt_btn ?? 'no button found' }}
   					
    		</div>




    		{{ $slot ?? 'no main content found' }}
            




    	</div>





    	{{ $scripts ?? 'no script found'}}

        <script defer src="{{ asset('https://cdn.jsdelivr.net/npm/alpinejs@3.8/dist/cdn.min.js') }}"></script>

    </body>
</html>
