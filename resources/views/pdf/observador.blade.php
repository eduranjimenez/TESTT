<style>
    @page {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: FuturaStd-Light;
        margin: 0;
        padding: 0;
    }

    .observer .background-image {
        background-color: black;
        background-repeat: no-repeat;
        background-position: left top;
        background-size: cover;
        object-fit: cover;

        height: 242pt;
        left: 0;
        margin: 0;
        padding: 0;
        position: absolute;
        top: 0;
        width: 153pt;
    }

    .observer .photo {
        background-color: black;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;

        border: 2px solid black;
        height: 72pt;
        left: 42pt;
        overflow: hidden;
        position: absolute;
        top: 57pt;
        width: 72pt;
        z-index: 2;
    }

    .observer .photo-image {
        top: 0;
        margin: 0;
        padding: 0;
        position: absolute;
        left: 0;
    }

    .observer .hidden {
        display: none;
    }


    .observer .details {
        text-align: center;
        position: absolute;
        top: 130pt;
        z-index: 2;
    }

    .observer .name {
        color: black;
        font-size: 10pt;
        font-weight: 600;
        line-height: 12pt;
        margin: 0 0 5pt 0;
        padding: 0;
    }

    .observer .institution {
        color: black;
        font-size: 09pt;
        font-weight: 300;
        line-height: 11pt;
        margin: 0;
        padding: 0;
    }

</style>

<div class="observer card">
    <img class="background-image" src='{{ public_path() }}/media/OBSERVADOR.png' height="242pt" width="153pt">
    <div class="photo">
        <img class="photo-image" src="{{ $participant->getImagePath() }}" width="96px">
    </div>

    <div class="details">
        <h1 class="name">{{ $participant->getFullName() }}</h1>
        <h2 class="institution">{{ $participant->institution->name }}</h2>
    </div>
</div>
