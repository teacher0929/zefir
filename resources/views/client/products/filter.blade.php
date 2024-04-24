<div>
    <form action="{{ url()->current() }}" method="get">

        <div class="mb-3">
            <label for="gender" class="form-label fw-semibold">Gender</label>
            <select class="form-select" id="gender" name="gender">
                <option value>-</option>
                @foreach($genders as $gender)
                    <option value="{{ $gender->slug }}" {{ $gender->slug == $f_gender ? 'selected':'' }}>
                        {{ $gender->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label fw-semibold">Category</label>
            <select class="form-select" id="category" name="category">
                <option value>-</option>
                @foreach($categories as $category)
                    <option value="{{ $category->slug }}" {{ $category->slug == $f_category ? 'selected':'' }}>
                        @if(isset($category->grandparent_id))
                            {{ $category->grandparent->name }} /
                        @endif
                        @if(isset($category->parent_id))
                            {{ $category->parent->name }} /
                        @endif
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label fw-semibold">Brand</label>
            <select class="form-select" id="brand" name="brand">
                <option value>-</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->slug }}" {{ $brand->slug == $f_brand ? 'selected':'' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="colors" class="form-label fw-semibold">Colors</label>
            <select class="form-select" id="colors" name="colors[]" multiple size="3">
                @foreach($colors as $color)
                    <option value="{{ $color->id }}" {{ in_array($color->id, $f_colors) ? 'selected':'' }}>
                        {{ $color->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sizes" class="form-label fw-semibold">Sizes</label>
            <select class="form-select" id="sizes" name="sizes[]" multiple size="3">
                @foreach($sizes as $size)
                    <option value="{{ $size->id }}" {{ in_array($size->id, $f_sizes) ? 'selected':'' }}>
                        {{ $size->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sortBy" class="form-label fw-semibold">Sort By</label>
            <select class="form-select" id="sortBy" name="sortBy">
                <option value {{ 'random' == $f_sortBy ? 'random':'' }}>
                    Random
                </option>
                <option value="newToOld" {{ 'newToOld' == $f_sortBy ? 'selected':'' }}>
                    New To Old
                </option>
                <option value="lowToHigh" {{ 'lowToHigh' == $f_sortBy ? 'selected':'' }}>
                    Low To High
                </option>
                <option value="highToLow" {{ 'highToLow' == $f_sortBy ? 'selected':'' }}>
                    High To Low
                </option>
            </select>
        </div>

        <div class="row g-2">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
            <div class="col">
                <a href="{{ url()->current() }}" class="btn btn-secondary w-100">Clear</a>
            </div>
        </div>

    </form>
</div>
