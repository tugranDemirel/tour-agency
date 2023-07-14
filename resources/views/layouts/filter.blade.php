<section id="search_container" style="background: url({{ asset($_mainConfig->filter_image) }}) no-repeat center top;
                position: relative;
    height: 700px;
    background-size: cover;
    color: #fff;
    width: 100%;
    display: table;
    z-index: 99;" >
    <div id="search">
        <div class="tab-content">
            <form action="{{ route('front.search') }}" method="get">
                <div class="tab-pane  active show" id="hotels">
                    <h3>@lang('Search Tours in Istanbul')</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Pick Up Location')</label>
                                <div class="styled-select-common">
                                    <select name="pickuplocation">
                                        @foreach($_cityLocations as $location)
                                            <option
                                                {{ isset($data['pickuplocation']) && $location->id == $data['pickuplocation']  ?  'selected' :
                                                        (old('pickuplocation') == $location->id ? 'selected' : '') }}
                                                value="{{ $location->id }}">
                                                @if($location->is_airport == 1)
                                                    <b>{{ $location->name }}</b>
                                                @else
                                                    {{ $location->name }}
                                                @endif
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Drop Off Location')</label>
                                <div class="styled-select-common">
                                    <select name="dropofflocation">
                                        @foreach($_cityLocations as $location)
                                            <option {{ isset($data['dropofflocation']) && $location->id == $data['dropofflocation']  ?  'selected' :
  (old('dropofflocation') == $location->id ? 'selected' : '')
 }} value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><i class="icon-calendar-7"></i> @lang('Deparature Date And Time')</label>
                                <input class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ isset($data['start_date']) ?  $data['start_date'] :   (old('start_date')) }}" type="datetime-local">
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-6">
                            <div class="form-group">
                                <label>@lang('Adults')</label>
                                <div class="numbers-row">
                                    <input type="text" value="{{ isset($data['adults_2']) ?  $data['adults_2'] : '1' }}" id="adults" class="qty2 form-control" name="adults_2">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-6">
                            <div class="form-group">
                                <label>@lang('Children')</label>
                                <div class="numbers-row">
                                    <input type="text" value="{{ isset($data['children_2']) ?  $data['children_2'] : '0' }}" id="children" class="qty2 form-control" name="children_2">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-12">
                            <div class="form-group">
                                <label><i class="icon-child"></i>@lang('Child Seat')</label>
                                <input class=" form-check @error('child_seat') is-invalid @enderror" {{ isset($data['child_seat']) ?  'checked' : (old('child_seat') ? 'checked' : '') }} type="checkbox" name="child_seat">
                            </div>
                        </div>
                    </div>

                    <div class="row roundClass


                    @if(old('type') != 'round')
                        d-none
                    @endif
                    @if(isset($data['type']) && $data['type'] != 'round')
                        d-none
                    @endif
                     wow fadeIn" data-wow-delay="0.1s">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Pick Up Location')</label>
                                <div class="styled-select-common">
                                    <select name="round_pickuplocation">
                                        @foreach($_cityLocations as $location)
                                            <option
                                                {{
                                                        isset($data['round_pickuplocation']) && $location->id == $data['round_pickuplocation']  ?  'selected'
                                                        : (old('round_pickuplocation') == $location->id ? 'selected' : '')
                                                }}
                                                value="{{ $location->id }}">
                                                @if($location->is_airport == 1)
                                                    <b>{{ $location->name }}</b>
                                                @else
                                                    {{ $location->name }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Drop Off Location')</label>
                                <div class="styled-select-common">
                                    <select name="round_dropofflocation">
                                        @foreach($_cityLocations as $location)
                                            <option {{
                                                    isset($data['round_dropofflocation']) && $location->id == $data['round_dropofflocation']  ?  'selected' :
                                               (old('round_dropofflocation') == $location->id ? 'selected' : '')
                                                    }} value="{{ $location->id }}">{{ $location->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row roundClass
                    @if(old('type') != 'round')
                        d-none
                    @endif
                    @if(isset($data['type']) && $data['type'] != 'round')
                        d-none
                    @endif
                      wow fadeIn" data-wow-delay="0.1s" >
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><i class="icon-calendar-7"></i> @lang('Deparature Date And Time')</label>
                                <input class="form-control @error('round_start_date') is-invalid @enderror" value="{{ isset($data['round_start_date']) ?  $data['round_start_date'] : old('round_start_date') }}" name="round_start_date" type="datetime-local">
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-6">
                            <div class="form-group ">
                                <label>@lang('Adults')</label>
                                <div class="numbers-row">
                                    <input type="text" value="{{ isset($data['round_adults_2']) ?  $data['round_adults_2'] : '1' }}" id="round_adults" class="qty2 form-control" name="round_adults_2">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-6">
                            <div class="form-group ">
                                <label>@lang('Children')</label>
                                <div class="numbers-row">
                                    <input type="text" value="{{ isset($data['round_children_2']) ?  $data['round_children_2'] : '0' }}" id="round_children" class="qty2 form-control" name="round_children_2">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-12">
                            <div class="form-group">
                                <label><i class="icon-child"></i>@lang('Child Seat')</label>
                                <input class=" form-check @error('round_child_seat') is-invalid @enderror" type="checkbox" {{ isset($data['round_child_seat']) ?  'checked' :  (old('round_child_seat') ? 'checked' : '') }} name="round_child_seat">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-3 col-12">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input mr-1" name="type"
                                           {{ old('type') == 'one-way' ? 'checked' : '' }}
                                           @if(empty($data['type']))
                                               checked
                                           @endif
                                           @isset($data['type'])
                                               @if($data['type'] == 'one-way')
                                                   checked
                                                  @endif
                                           @endisset
                                           value="one-way" id="oneWay">@lang('One Way')
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-12">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input mr-1" id="round"
                                           {{ old('type') == 'round' ? 'checked' : '' }}
                                           {{ isset($data['type']) && $data['type'] == 'round' ?  'checked' : '' }}
                                           value="round" name="type">@lang('Round')
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <!-- End row -->
                    <hr>
                    <button class="btn_1 green"><i class="icon-search"></i>@lang('Search now')</button>
                </div>
            </form>
        </div>
    </div>
</section>
@section('scripts')
    <script>
        $(document).ready(function () {
            @if(old('type') == 'round')
            $('.roundClass').removeClass('d-none');
            @endif
                @if(isset($data['type']) && $data['type'] == 'round')
            $('.roundClass').removeClass('d-none');
            @endif
            $('#round').click(function () {
                $('.roundClass').removeClass('d-none');
            });
            $('#oneWay').click(function () {
                $('.roundClass').addClass('d-none');
                $('.roundClass').removeClass('wow');
                $('.roundClass').removeClass('fadeIn');
            });
        })
    </script>
@endsection
<!-- End hero -->
