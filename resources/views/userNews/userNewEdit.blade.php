<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-center mt-4 border-bottom pb-4">Edit your article</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('articleEditSubmit', $idArticle = $data->id) }}" class="row g-3 m-5" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputName3" class="col-sm-2 col-form-label">Name Author</label>
                        <div class="col-sm-4">
                            <input type="text" name="creator" class="form-control" id="inputName3" value="{{ old('creator') }} {{ $data->creator }}">
                        </div>
                        <label for="inputState" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-4">
                            <select id="inputState" name="category" class="form-select">
                                <option selected value="World">World</option>
                                <option value="Russia">Russia</option>
                                <option value="Economy">Economy</option>
                                <option value="Technology">Technology</option>
                                <option value="Politics">Politics</option>
                                <option value="Sport">Sport</option>
                                <option value="Health">Health</option>
                                <option value="Style">Style</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Title:</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="{{ old('title') }} {{ $data->title }}" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="exampleFormControlInput2" class="col-sm-2 col-form-label">Description:</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" value="{{ old('description') }} {{ $data->description }}" class="form-control" id="exampleFormControlInput2">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Article:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="9">{{ old('content') }} {{ $data->content }}</textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="file" name="file" value="Upload Image" class="form-control col-sm-6">
                    </div>
                    <div class="mb-3 row column-gap-3">
                        @if ($data->id_user == $admin->id)
                            <button type="submit" class="btn btn-success col-sm-3" value="save" name="adminSave">Save</button>
                            <button type="submit" class="btn btn-info col-sm-3" value="Send for moderation" name="publish">Published</button>
                        @else
                            <button type="submit" class="btn btn-success col-sm-3" value="save" name="articleSave">Save</button>
                            <button type="submit" class="btn btn-primary col-sm-3" value="Send for moderation" name="articleModeration">Send for moderation</button>
                        @endif
                    </div>
                </form>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#exampleFormControlTextarea1'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>

            </div>
        </div>
    </div>
</x-app-layout>
