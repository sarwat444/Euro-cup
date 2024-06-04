<td>
    <ul class="action">
        <li class="edit"><a href="{{route('panel.votes.show',$vote->id)}}"><i class="fa fa-eye"></i></a></li>
        <li class="delete" hidden=""><a href="javascript:;" class="delete_item" data-url="{{route('panel.votes.delete',$vote->id)}}"><i class="icon-trash"></i></a></li>
    </ul>
</td>
