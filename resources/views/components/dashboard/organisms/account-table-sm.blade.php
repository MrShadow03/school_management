@props(['account'])
<div class="table_box table-card card-head">
    <div class="table-wrapper-card">
        <div class="heading">
            <h1 class="text-title pb-1 pt-2 text-center">{{ $account->name }}</h1>
            <p class="fs-14 text-center pb-2 border-bottom {{ $account->status ? 'text-success' : 'text-primary' }}">Status: {{ $account->status ? 'Active' : 'Inactive' }}</p>
            <p class="pb-1 pt-1 form_subtitle fs-18 text-center"><i class="fa-light fa-angle-down"></i></p>
        </div>
        <div class="details card-content" data-simple-scroll>
            <table class="w-100">
                <thead>
                    <tr class="heading-row">
                        <th class="heading-column text-title-column">Name</th>
                        <th class="heading-column text-title-column">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($account->expenses, true) as $expanse=>$amount)
                    <tr class="body-row">
                        <td class="body-column text-body-column">{{ $expanse }}</td>
                        <td class="body-column text-body-column">{{ $amount }} <i class="fa-regular fa-bangladeshi-taka-sign"></i></td>
                    </tr>
                    @endforeach
                    <tr class="body-row border-bottom">
                        <td class="body-column text-title-column">Total</td>
                        <td class="body-column text-title-column">{{ $account->total }} <i class="fa-regular fa-bangladeshi-taka-sign"></i></td>
                    </tr>
                    <tr class="body-row">
                        <td class="body-column text-body-column text-center pt-1" style="display: flex;justify-content: end; gap: 1rem; background:#fff;" colspan="2">
                            <a href="{{ route('admin.account.edit', $account->id) }}" class="btn-sm"><i class="fa-regular fa-edit"></i> Edit</a>
                            <a href="{{ route('admin.account.updateStatus', [$account->id, $account->status]) }}" class="{{ $account->status ? 'btn-sm-danger' : 'btn-sm-success' }}">{!! $account->status ? '<i class="fa-regular fa-lock"></i> Deactivate' : '<i class="fa-regular fa-check"></i> Activate' !!}</a>
                        </td>
                    </tr>
                    @php
                        $classes = json_decode($account->classes, true);
                        sort($classes);
                    @endphp
                    <p class="fs-14 text-center pb-1">For Class: @foreach ($classes as $class)
                            {{ $class }}{{ $loop->last ? '' : ', ' }}
                    @endforeach</p>
                    @if ($account->status)
                    <p class="fs-14 text-center text-alert">Expires in: {{ Carbon\Carbon::parse($account->expire)->diffInDays() > 1 ? Carbon\Carbon::parse($account->expire)->diffInDays().' days' : Carbon\Carbon::parse($account->expire)->diffInDays().' day' }}</p>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>