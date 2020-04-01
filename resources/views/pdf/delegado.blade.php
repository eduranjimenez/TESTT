<style>
    @page {
        margin: 0;
        padding: 0;
    }

    body {
        @font-face {
        font-family: 'FuturaStd-Light';
        font-style: normal;
        font-weight: normal;
        src: local('FuturaStd-Light'), url('FuturaStd-Light.otf') format('otf');
        }
        margin: 0;
        padding: 0;
    }

    .delegate .background-image {
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

    .delegate .photo {
        background-color: black;
        background-repeat: no-repeat;
        background-position: center center;
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

    .delegate .photo-image {
        top: 0;
        margin: 0;
        padding: 0;
        position: absolute;
        left: 0;
    }

    .delegate .hidden {
        display: none;
    }


    .delegate .details {
        text-align: center;
        position: absolute;
        top: 130pt;
        z-index: 2;
    }

    .delegate .representation {
        color: black;
        font-size: 7pt;
        font-weight: 600;
        line-height: 12pt;
        margin: 0 0 3pt 0;
        padding: 0;
    }

    .delegate .commission {
        color: black;
        font-size: 06pt;
        font-weight: 300;
        line-height: 08pt;
        margin: 0 0 10pt 0;
        padding: 0;
    }

     .delegate .name {
        color: black;
        font-size: 10pt;
        font-weight: 600;
        line-height: 12pt;
        margin: 0 0 5pt 0;
        padding: 0;
        
    }

    .delegate .institution {
        color: black;
        font-size: 09pt;
        font-weight: 300;
        line-height: 11pt;
        margin: 0;
        padding: 0;
    }
</style>

<div class="delegate card">
    <img class="background-image" src='{{ public_path() }}/media/DELEGADO.png' height="242pt" width="153pt">
    <div class="photo">
        <img class="photo-image" src="{{ $participant->getImagePath() }}" width="96px">
    </div>

    <div class="details">
        <h1 class="representation">{{ $participant->getRepresentation() }}</h1>
        <h2 class="commission">{{ $participant->getCommission() }}</h2>
        <h2 class="name">{{ $participant->getFullName() }}</h2>
        <h2 class="institution">{{ $participant->institution->name }}</h2>
    </div>
</div>
