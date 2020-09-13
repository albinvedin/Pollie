<div class="card">
    <div class="card-body">
        <h4 class="card-title">
            {{ $title }}
        </h4>
        <br>
        <div style="max-height: 500px; overflow-y: auto;">
            @if($collection->isEmpty())
                <p class="m-0">
                    No polls were found...
                </p>
            @else
                <table class="table m-0">
                    <tbody>
                    @foreach($collection as $poll)
                        <tr>
                            <td class="w-75">
                                <p class="m-0">
                                    {{ $poll->question }}
                                </p>
                                <small class="text-muted">
                                    {{ $poll->created_at->toFormattedDateString() }}
                                </small>
                            </td>
                            <td class="w-25">
                            <span class="badge badge-pill badge-info">
                                <i class="fas fa-poll"></i>
                                {{ $poll->votes()->count() }}
                            </span>
                                <a href="{{ route('polls.show', $poll) }}" data-toggle="tooltip" data-placement="top" title="View poll">
                                    <span class="badge badge-pill badge-primary">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
