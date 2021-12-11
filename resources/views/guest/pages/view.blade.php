@extends('guest.layouts.app')

@section('content')
    <main class="site-main  page--text">
        <article class="site-page" data-template-page>
            <header class="page-masthead">
                <h1 class="page-title">
                    {{$page->name}}
                </h1>
            </header>
            <div class="page-content rte" >
                <meta charset="utf-8">
                <section class="article-info">
                    <div class="article-content">
                        <div class="article-body">
                            {!! $page->content !!}
                        </div>
                    </div>
                </section>
            </div>
        </article>
    </main>
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush
