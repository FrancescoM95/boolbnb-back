@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3 text-center">Messaggi Archiviati</h1>
        {{-- indietro e massive restore --}}
        <div class="d-flex justify-content-between">
            {{-- <a href="{{ route('admin.messages.index'), $apartment->id }}" class="btn btn-secondary"><i
                    class="fas fa-arrow-left me-2 d-none d-sm-inline"></i>Indietro</a> --}}
            {{-- Ripristina tutto --}}
            <form action="{{ route('admin.messages.massiverestore') }}" method="POST" class="restore-form">
                @csrf
                @method('PATCH')
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal">
                    <i class="fas fa-arrows-rotate "></i>
                    <span class="d-none d-md-inline ms-2">Ripristina tutto</span>
                </button>
            </form>
        </div>
        {{-- tabella --}}
        <table class="table table-striped table-hover my-3">
            <thead>
                <tr>
                    <th scope="col" class="col-2">Nome e Cognome</th>
                    <th scope="col" class="col-2">Email</th>
                    <th scope="col" class="col-3">Messaggio</th>
                    <th scope="col" class="col-2">Data</th>
                    <th scope="col" class="col-2"></th>
                </tr>
            </thead>
            <tbody>
                @if ($messages->isEmpty())
                    <tr>
                        <td colspan="12">
                            <h3 class="text-center m-0">Non sono presenti messaggi per questo appartamento</h3>
                        </td>
                    </tr>
                @else
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->name }} {{ $message->surname }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->getAbstract($message->text) }}{{ strlen($message->text) > 20 ? ' [...]' : '' }}
                            </td>
                            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-center d-flex justify-content-center gap-2">
                                {{-- Pulsante restore --}}
                                <form title="Ripristina" action="{{ route('admin.messages.restore', $message->id) }}"
                                    method="POST" class="restore-form">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="btn btn-md btn-success d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#modal" style="width: 30px">
                                        <i class="fas fa-arrows-rotate"></i>
                                    </button>
                                </form>
                            </td>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
