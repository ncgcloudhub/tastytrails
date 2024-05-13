@php
    $menuCategories = \App\Models\MenuCategory::all();
    $menusGroupedByCategory = \App\Models\Menu::with('category')
        ->get()
        ->groupBy('menu_category_id');
@endphp

<div class="menu-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Special Menu</h2>
                    <p>Our Menu</p>
                </div>
            </div>
        </div>
        
        <div class="row inner-menu-box">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>
                    @foreach ($menuCategories as $category)
                <a class="nav-link" id="v-pills-{{$category->id}}-tab" data-toggle="pill" href="#v-pills-{{$category->id}}" role="tab" aria-controls="v-pills-{{$category->id}}" aria-selected="false">{{$category->menu_category_name}}</a>
            @endforeach
            <a class="nav-link" id="v-pills-full-menu-tab" data-toggle="pill" href="#v-pills-full-menu" role="tab" aria-controls="v-pills-full-menu" aria-selected="false">Full Menu</a>
                </div>
            </div>
            
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                   
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="row">
                            @foreach ($menusGroupedByCategory as $categoryId => $menus)
                            @foreach ($menus as $menu)
                            <div class="col-lg-3 col-md-6 special-grid">
                                <div class="gallery-single fix">
                                    <img style="width: 400px; height: 200px;" src="{{ asset('storage/' . $menu->image) }}" class="img-fluid" alt="{{ $menu->item_name }}">
                                    <div class="why-text" style="padding: 1px;"> <!-- Decreased padding for more compact layout -->
                                        <h4 style="font-size: 14px;">{{ $menu->item_name }}</h4> <!-- Further decreased font size for item name -->
                                        <p style="font-size: 10px;">{{ $menu->description }}</p> <!-- Further decreased font size for description -->
                                        <h5 style="font-size: 12px;">${{ $menu->price }}</h5> <!-- Further decreased font size for price -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    @endforeach
                      
                       
                        </div>
                        
                    </div>

                    @foreach ($menuCategories as $category)
                    <div class="tab-pane fade" id="v-pills-{{$category->id}}" role="tabpanel" aria-labelledby="v-pills-{{$category->id}}-tab">
                        <div class="row">
                            @if (isset($menusGroupedByCategory[$category->id]))
                                @foreach ($menusGroupedByCategory[$category->id] as $menu)
                                    <div class="col-lg-4 col-md-6 special-grid">
                                        <div class="gallery-single fix">
                                            <img style="width: 400px; height: 240px;" src="{{ asset('storage/' . $menu->image) }}" class="img-fluid" alt="{{ $menu->item_name }}">
                                            <div class="why-text" style="padding: 1px;"> <!-- Decreased padding for more compact layout -->
                                                <h4 style="font-size: 14px;">{{ $menu->item_name }}</h4> <!-- Further decreased font size for item name -->
                                                <p style="font-size: 12px;">{{ $menu->description }}</p> <!-- Further decreased font size for description -->
                                                <h5 style="font-size: 12px;">${{ $menu->price }}</h5> <!-- Further decreased font size for price -->
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No menus available for this category.</p>
                            @endif
                        </div>
                    </div>
                @endforeach
                

{{-- FULL MENU --}}
<div class="tab-pane fade" id="v-pills-full-menu" role="tabpanel" aria-labelledby="v-pills-full-menu-tab">
    <div class="row">
        @foreach ($menusGroupedByCategory as $categoryId => $menus)
            @php
                $categoryName = \App\Models\MenuCategory::findOrFail($categoryId)->menu_category_name;
            @endphp
            <div class="col-12 mt-4">
                <h2 class="text-danger" style="font-size: 1.5rem;">{{ $categoryName }}</h2>
            </div>
            @foreach ($menus as $menu)
                <div class="col-lg-4 col-md-6 mt-3">
                    <div class="special-grid">
                        <h4>{{ $menu->item_name }}</h4>
                        <p>{{ $menu->description }}</p>
                        <h5 class="text-info"><b>${{ $menu->price }}</b></h5>   
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
{{-- FULL MENU END --}}


                   
                </div>
            </div>
        </div>
        
    </div>
</div>