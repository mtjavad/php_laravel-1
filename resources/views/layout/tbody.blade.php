<tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->password}}</td>
    <td>{{$user->created_at}}</td>
    <td>{{$user->getEven()}}</td>
    <td>
        <a class="btn btn-warning" href="{{route('admin.edit',$user->id)}}">ویرایش</a>
        <a class="btn btn-danger" href="{{route('admin.delete',$user->id)}}">حذف</a>
        <button class="btn btn-info wer"  value="{{$user->id}}">اجکس</button>
    </td>
</tr>