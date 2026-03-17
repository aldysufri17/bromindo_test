<x-app-layout>
<x-slot name="header">
    <h2 class="h4">Data KTP</h2>
</x-slot>
<div class="container mt-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Activity</th>
                <th>Perubahan</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $key => $log)
            <tr>
                <td>{{ $logs->firstItem() + $key }}</td>
                <td>{{ $log->user->name ?? '-' }}</td>
                <td>{{ $log->activity }}</td>
                <td width="50%">
                    @if($log->data)
                        <ul class="mb-0">
                            @foreach($log->data as $field => $change)
                                <li>
                                    <b>{{ $field }}</b>:
                                    
                                    <span class="text-danger">
                                        {{ is_string($change['old']) && strtotime($change['old']) 
                                            ? Carbon\Carbon::parse($change['old'])->translatedFormat('d F Y H:i') 
                                            : $change['old'] }}
                                    </span>
                                    →
                                    <span class="text-success">
                                        {{ is_string($change['new']) && strtotime($change['new']) 
                                            ? Carbon\Carbon::parse($change['new'])->translatedFormat('d F Y H:i') 
                                            : $change['new'] }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>{{ Carbon\Carbon::parse($log->created_at)->translatedFormat('d F Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $logs->links() }}
</div>
</x-app-layout>