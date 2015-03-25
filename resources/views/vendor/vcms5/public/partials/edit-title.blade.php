@if ((Auth::user()) && (Auth::user()->hasRole('pages')))
    <h2>
        <article style='width: 100%; display: inline'>
            <span id="editablecontenttitle" class="editablecontenttitle">{!! $page_title or ' ' !!}</span>
        </article>
    </h2>
@else
    <h2>{!! $page_title or ' ' !!}</h2>
@endif