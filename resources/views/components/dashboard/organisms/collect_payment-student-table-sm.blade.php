@props(['students', 'account', 'current_section'])
<div class="table_box grid-row2">
    <h1 class="text-title text-center">{{ $account->name }}</h1>
    <p class="fs-14 text-primary text-center">Amount: {{ $account->total }} <i class="fa-regular fa-bangladeshi-taka-sign"></i></p>
    <p class="fs-14 text-primary text-center pt-1">Class: {{ $current_section->class }}</p>
    <p class="fs-14 text-primary text-center">Section: {{ $current_section->name }}</p>
    <p class="fs-14 text-primary text-center pb-2 border-bottom">Date: {{ date('d M, Y') }}</p>
    <div class="table-wrapper">
        <table class="w-100">
            <thead>
                <tr class="heading-row">
                    <th class="heading-column text-title-column">Roll</th>
                    <th class="heading-column text-title-column">Name</th>
                    <th class="heading-column text-title-column" colspan="2">Payment</th>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="body-row">
                    <td class="body-column text-body-column">{{ $student->class_roll }}</td>
                    <td class="body-column text-body-column">{{ $student->name }}</td>
                    <td class="body-column text-body-column">
                        <form class="table-wrapper-alt" action="{{ route('teacher.collect_payment.store') }}" method="POST" style="display: flex;gap: 3rem;">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="section_id" value="{{ old('section_id', $current_section->id) }}">
                            <input type="hidden" name="account_id" value="{{ old('account_id', $account->id) }}">
                            <input type="hidden" name="student_id" value="{{ old('student_id', $student->id) }}">
                            <input type="hidden" name="teacher_id" value="{{ old('teacher_id', auth()->user()->id) }}">
                            <input type="number" name="amount" class="input-box" value="{{ $account->total }}" required>
                            @error('amount', $student->id)
                            <p class="input_error">{{ $message }}</p>
                            @enderror
                            <button type="submit" class="button-30">Save</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>