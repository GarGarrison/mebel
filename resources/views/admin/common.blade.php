<div class="row">
    <div class="input-field col s4 l3">
        <input name="header" type="text" class="validate" value="{{ $current['header'] or '' }}">
        <label class="{{ $class }}" for="header">Заголовок</label>
        @if ($errors->has('header'))
            <span class="error-block">{{ $errors->first('header') }}</span>
        @endif
    </div>
    <div class="input-field col s4 l3">
        <input name="menu_name" type="text" class="validate" value="{{ $current['menu_name'] or '' }}">
        <label class="{{ $class }}" for="menu_name">Имя в меню</label>
        @if ($errors->has('menu_name'))
            <span class="error-block">{{ $errors->first('menu_name') }}</span>
        @endif
    </div>
    <div class="input-field col s4 l3">
        <input name="url_name" type="text" class="validate" value="{{ $current['url_name'] or '' }}">
        <label class="{{ $class }}" for="url_name">URL</label>
        @if ($errors->has('url_name'))
            <span class="error-block">{{ $errors->first('url_name') }}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="input-field col s6 l4">
        <input name="img_base" type="text" class="validate" value="{{ $current['img_base'] or '' }}">
        <label class="{{ $class }}" for="img_base">Img Base</label>
        @if ($errors->has('img_base'))
            <span class="error-block">{{ $errors->first('img_base') }}</span>
        @endif
    </div>
    <div class="input-field col s6 l4">
        <input name="img_title" type="text" class="validate" value="{{ $current['img_title'] or '' }}">
        <label class="{{ $class }}" for="img_title">Заглавная картинка</label>
        @if ($errors->has('img_title'))
            <span class="error-block">{{ $errors->first('img_title') }}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="input-field col s12 l8">
        <input name="title" type="text" class="validate" value="{{ $current['title'] or '' }}">
        <label class="{{ $class }}" for="title">Title</label>
        @if ($errors->has('title'))
            <span class="error-block">{{ $errors->first('title') }}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="input-field col s6 l4">
        <input name="meta_keywords" type="text" class="validate" value="{{ $current['meta_keywords'] or '' }}">
        <label class="{{ $class }}" for="meta_keywords">Мета keywords</label>
        @if ($errors->has('meta_keywords'))
            <span class="error-block">{{ $errors->first('meta_keywords') }}</span>
        @endif
    </div>
    <div class="input-field col s6 l4">
        <input name="meta_description" type="text" class="validate" value="{{ $current['meta_description'] or '' }}">
        <label class="{{ $class }}" for="meta_description">Мета description</label>
        @if ($errors->has('meta_description'))
            <span class="error-block">{{ $errors->first('meta_description') }}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="input-field col s12 l8">
        <textarea name="description" class="materialize-textarea">{{ $current['description'] or '' }}</textarea>
        <label class="{{ $class }}" for="description">Описание</label>
    </div>
</div>