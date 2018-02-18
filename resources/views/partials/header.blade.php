<div class="row">
    <ol class="breadcrumb">
        <li> 
            <em class="fa fa-home"></em>
        </li>
        @foreach ($breadcrumb as $element)
            @if ($loop->last)
                <li class="active">{{ __($element) }}</li>
            @else
                <li>{{ __($element) }}</li>
            @endif 
        @endforeach 
    </ol>
</div><!--/.row--> 