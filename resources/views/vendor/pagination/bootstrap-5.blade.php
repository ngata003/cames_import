@if ($paginator->hasPages())
    <nav class="d-flex justify-content-start w-100">  <!-- Aligné à gauche et largeur 100% -->
        <div class="d-flex justify-content-between flex-fill w-100 d-sm-none">
            <ul class="pagination m-0"> <!-- m-0 pour enlever les marges -->
                {{-- Lien Retour --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Retour</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link text-decoration-none" href="{{ $paginator->previousPageUrl() }}" rel="prev">Retour</a>
                    </li>
                @endif

                {{-- Lien Suivant --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link text-decoration-none" href="{{ $paginator->nextPageUrl() }}" rel="next">Suivant</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Suivant</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <!-- Message supprimé, donc plus d'affichage de "Affichage de..." -->
                <!-- {!! __('Affichage de') !!}
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                {!! __('à') !!}
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                {!! __('sur') !!}
                <span class="fw-semibold">{{ $paginator->total() }}</span>
                {!! __('résultats') !!} -->
            </div>

            <div>
                <ul class="pagination m-0">
                    {{-- Lien Retour --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">Retour</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link text-decoration-none" href="{{ $paginator->previousPageUrl() }}" rel="prev">Retour</a>
                        </li>
                    @endif

                    {{-- Liens de pagination --}}
                    @foreach ($elements as $element)
                        {{-- "..." pour indiquer des pages manquantes --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        {{-- Affichage des numéros de page --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link text-decoration-none" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Lien Suivant --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link text-decoration-none" href="{{ $paginator->nextPageUrl() }}" rel="next">Suivant</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">Suivant</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif


