@if($services)
    @foreach($services as $service)
<div class="col-sm-6">
    <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
        <div class="media">
            <div class="media-body fnt-smaller">
                <h4 class="media-heading">
                    <a href="#" target="_parent">{{ substr($service['service_name'], 0, 40) }}{{ (strlen($service['service_name']) > 40) ? '...': '' }}</a></h4>
                <h6>{{$service['organization']}}</h6>


                <p class="hidden-xs">Situated between fairmount
                    park and the prestigious philadelphia cricket
                    club, this beautiful 2+ acre property is truly
                    ...</p>
                <span class="fnt-smaller fnt-lighter fnt-arial">
                    Keyword here
                </span>
            </div>
        </div>
    </div>
    </div>
    @endforeach
@else
    <div class="col-sm-12">
    <h5>No records found.</h5>
    </div>
@endif
