<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row">
            <!-- <div class="col-xl-3">
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div> -->
            <div class="col-xl-3">
                <div class="card mt-3">
                    <h5 class="card-header">Поиск новых изображений</h5>
                    <div class="card-body">
                        <form role="form" method="post" action="{{ route('dashboard.store') }}">
                            @csrf
                            <div class="mb-3">
                                <input name="search" type="text" class="form-control" placeholder="Что будем искать?">
                            </div>
                            <div class="mb-3">
                                <input name="page" type="text" class="form-control" placeholder="С какой страницы?">
                            </div>
                            <div class="mb-3">
                                <input name="per_page" type="text" class="form-control" placeholder="Сколько элементов на страницу?">
                            </div>
                            <select name="orientation" class="form-select mb-3">
                                <option selected>Какая ориентация</option>
                                <option value="landscape">landscape</option>
                                <option value="portrait">portrait</option>
                                <option value="squarish">squarish</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Искать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>