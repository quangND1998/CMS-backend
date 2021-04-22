 <div class="container">
     <div class="row">
         <div class="col-lg-8 ml-auto mr-auto topsection_margin text-center">
             @if (Config::get('app.locale') == 'vn')
                 <h2 class="heading">{{ $section->title_vn }}</h2>
                 <p>{{ $section->sub_title_vn }}
                 </p>
             @endif
             @if (Config::get('app.locale') == 'en')
                 <h2 class="heading">{{ $section->title }}</h2>
                 <p>{{ $section->sub_title }}
                 </p>
             @endif



         </div>
     </div>
     <div class="row align-items-center">
         <div class="col-lg-4 text-center text-lg-right">
             @for ($i = 0; $i < floor(count($section->contents) / 2); $i++)
                 <div class="service-box icon-right mb-xs-4 wow zoomIn" data-wow-duration=".2s" data-wow-delay=".1s">
                     <i class=""><img src={{ $section->contents[$i]->image }}></i>
                     @if (Config::get('app.locale') == 'vn')
                         <h4 class="m-0">{{ $section->contents[$i]->title_vn }}</h4>
                         <p> {{ $section->contents[$i]->detail_vn }}</p>
                     @endif
                     @if (Config::get('app.locale') == 'en')
                         <h4 class="m-0">{{ $section->contents[$i]->title }}</h4>
                         <p> {{ $section->contents[$i]->detail }}</p>
                     @endif

                 </div>
             @endfor


         </div>

         <div class="col-lg-4 text-center mb-xs-4 wow zoomIn" data-wow-duration=".3s" data-wow-delay=".2s">
             <p><img class="img-fluid" src="{{ $section->contents[floor(count($section->contents) / 2)]->image }}"
                     alt="" /></p>
         </div>
         <div class="col-lg-4 text-center text-lg-left">
             @for ($i = ceil((count($section->contents) / 2)); $i < count($section->contents); $i++)
                 <div class="service-box icon-left mb-xs-4 wow zoomIn" data-wow-duration=".2s" data-wow-delay=".1s">
                     <i class=""><img src={{ $section->contents[$i]->image }}></i>
                     @if (Config::get('app.locale') == 'vn')
                         <h4 class="m-0">{{ $section->contents[$i]->title_vn }}</h4>
                         <p> {{ $section->contents[$i]->detail_vn }}</p>
                     @endif
                     @if (Config::get('app.locale') == 'en')
                         <h4 class="m-0">{{ $section->contents[$i]->title }}</h4>
                         <p> {{ $section->contents[$i]->detail }}</p>
                     @endif
                 </div>
                 @endfor



         </div>
     </div>
 </div>
