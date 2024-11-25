@extends('layouts.app')


@section('content')

    <div id="search-results-app">
        <h1 class="sr-search-results-title">
            Результаты поиска для: "<span class="sr-query-text">{{ $query }}</span>"
        </h1>

    </div>

    <test-product
            :products='{{ json_encode($products->items()) }}'
            :categories='@json($categories)'
            :brands='@json($brands)'
            :countries='@json($countries)'
            :price='@json($price)'
            query="{{ $query }}"
            :current-page="{{ $products->currentPage() }}"
            :last-page="{{ $products->lastPage() }}"
            @filter-updated="updateFilters"
    ></test-product>

@endsection

{{--{{ dd($products) }}--}}
{{--    <div class="sr-search-results-container">--}}
{{--        <h1 class="sr-search-results-title">Результаты поиска для: "<span class="sr-query-text">{{ $query }}</span>"--}}
{{--        </h1>--}}

{{--        @if($products->isEmpty())--}}
{{--            <p class="sr-no-results-message">Продукты не найдены.</p>--}}
{{--        @else--}}
{{--            <div class="sr-product-list">--}}
{{--                @foreach($products as $product)--}}
{{--                    <div class="sr-product-item">--}}
{{--                        <a href="{{ route('product.view', $product->id) }}" class="sr-product-link">--}}
{{--                            <img alt="{{ $product->name }}" class="sr-product-image"--}}
{{--                                 src="{{ Storage::url('public/products/' . $product->image) }}" width="auto"--}}
{{--                                 height="270"/>--}}
{{--                            <h3 class="sr-product-name">{{ $product->name }}</h3>--}}
{{--                            <button class="sr-btn-view-details">Подробнее</button>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            <!-- Пагинация с передачей поискового запроса -->--}}
{{--            <div class="sr-pagination">--}}
{{--                {{ $products->appends(['s_search5' => $query])->links() }}--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--@endsection--}}

{{--<style>--}}
{{--    .container {--}}
{{--        max-width: none !important;--}}
{{--        padding: 0 !important;--}}
{{--    }--}}

{{--    body .sr-search-results-container {--}}
{{--        width: 100%;--}}
{{--        max-width: 1400px; /* Ваше значение */--}}
{{--        padding: 20px;--}}
{{--        min-height: 100% !important;; /* Задает минимальную высоту для контента */--}}

{{--    }--}}

{{--    .Items_Back {--}}
{{--        all: unset !important; /* Сбрасывает все стили, включая базовые */--}}
{{--        display: block;--}}
{{--    }--}}

{{--    /* Основные стили контейнера для страницы */--}}
{{--    .sr-search-results-container {--}}
{{--        width: 100% !important; /* Гарантирует, что ширина будет полной */--}}
{{--        max-width: none !important; /* Снимает ограничения на максимальную ширину */--}}
{{--        margin: 0 auto; /* Центрирование */--}}
{{--        padding: 20px;--}}
{{--    }--}}

{{--    /* Заголовок результатов */--}}
{{--    .sr-search-results-title {--}}
{{--        font-size: 2rem;--}}
{{--        font-weight: bold;--}}
{{--        margin-bottom: 20px;--}}
{{--        color: #333;--}}
{{--    }--}}

{{--    .sr-query-text {--}}
{{--        color: #ff6347; /* Цвет для текста запроса */--}}
{{--    }--}}

{{--    /* Сообщение о том, что продукты не найдены */--}}
{{--    .sr-no-results-message {--}}
{{--        font-size: 1.2rem;--}}
{{--        color: #777;--}}
{{--        margin-top: 20px;--}}
{{--    }--}}

{{--    /* Стили для списка продуктов */--}}
{{--    .sr-product-list {--}}
{{--        display: grid;--}}
{{--        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));--}}
{{--        gap: 20px;--}}
{{--        padding: 0;--}}
{{--        list-style: none;--}}
{{--        margin-top: 30px;--}}
{{--    }--}}

{{--    /* Каждый товар в списке */--}}
{{--    .sr-product-item {--}}
{{--        background-color: #f9f9f9;--}}
{{--        border-radius: 8px;--}}
{{--        overflow: hidden;--}}
{{--        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);--}}
{{--        transition: transform 0.3s ease, box-shadow 0.3s ease;--}}
{{--    }--}}

{{--    /* Эффект при наведении на товар */--}}
{{--    .sr-product-item:hover {--}}
{{--        transform: translateY(-10px);--}}
{{--        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);--}}
{{--    }--}}

{{--    .sr-product-link {--}}
{{--        display: block;--}}
{{--        color: inherit;--}}
{{--        text-decoration: none;--}}
{{--    }--}}

{{--    /* Изображение товара */--}}
{{--    .sr-product-image {--}}
{{--        width: 100%;--}}
{{--        height: 200px;--}}
{{--        object-fit: cover;--}}
{{--        border-bottom: 2px solid #ddd;--}}
{{--    }--}}

{{--    /* Название товара */--}}
{{--    .sr-product-name {--}}
{{--        font-size: 1.2rem;--}}
{{--        font-weight: bold;--}}
{{--        padding: 15px;--}}
{{--        color: #333;--}}
{{--        text-align: center;--}}
{{--    }--}}


{{--    /* Кнопка "Подробнее" */--}}
{{--    .sr-btn-view-details {--}}
{{--        display: block;--}}
{{--        width: 100%;--}}
{{--        background-color: rgb(193, 123, 0);--}}
{{--        color: white;--}}
{{--        font-size: 1rem;--}}
{{--        padding: 10px;--}}
{{--        border: none;--}}
{{--        border-radius: 5px;--}}
{{--        margin-top: 10px;--}}
{{--        text-align: center;--}}
{{--        cursor: pointer;--}}
{{--        transition: background-color 0.3s;--}}
{{--    }--}}

{{--    .sr-btn-view-details:hover {--}}
{{--        background-color: #e5533d;--}}
{{--    }--}}

{{--    .sr-pagination {--}}
{{--        margin-top: 50px;--}}
{{--        display: flex;--}}
{{--        justify-content: start !important;--}}
{{--    }--}}

{{--    .sr-pagination .page-link {--}}
{{--        color: #ff6347;--}}
{{--        margin: 0 5px;--}}
{{--        text-decoration: none;--}}
{{--        border: 1px solid #ddd;--}}
{{--        padding: 8px 12px;--}}
{{--        border-radius: 4px;--}}
{{--        transition: background-color 0.3s, color 0.3s;--}}
{{--    }--}}

{{--    .sr-pagination .page-link:hover {--}}
{{--        background-color: #ff6347;--}}
{{--        color: white;--}}
{{--    }--}}

{{--    .sr-pagination .page-item.active .page-link {--}}
{{--        background-color: #e5533d;--}}
{{--        color: white;--}}
{{--        border-color: #e5533d;--}}
{{--    }--}}

{{--    /* Адаптивность для маленьких экранов */--}}
{{--    @media (max-width: 768px) {--}}
{{--        .sr-search-results-title {--}}
{{--            font-size: 1.5rem;--}}
{{--        }--}}

{{--        .sr-product-list {--}}
{{--            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));--}}
{{--        }--}}

{{--        .sr-product-name {--}}
{{--            font-size: 1rem;--}}
{{--        }--}}

{{--        .sr-product-description {--}}
{{--            font-size: 0.9rem;--}}
{{--        }--}}

{{--        .sr-btn-view-details {--}}
{{--            font-size: 0.9rem;--}}
{{--        }--}}

{{--    }--}}
{{--</style>--}}

