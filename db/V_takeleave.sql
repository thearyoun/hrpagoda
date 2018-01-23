create view V_takeleaves as select monk_take_leaves.use_monk_id as member_id,monks.username as member_name,
response.username as respone_name,leave_types.name as leave_name,
monk_take_leaves.reason,monk_take_leaves.from_date,monk_take_leaves.to_date,
monk_take_leaves.request_date,monk_take_leaves.notes,monk_take_leaves.created_at,
monk_take_leaves.modified_at,monk_take_leaves.status,1 as type
from monk_take_leaves
join monks on monks.id=monk_take_leaves.use_monk_id
join monks as response on response.id=monk_take_leaves.use_handle_by_id
join leave_types on leave_types.id=monk_take_leaves.use_leave_type_id
where monks.status=1
UNION ALL
select member_take_leaves.use_member_id as member_id,members.username as member_name,
response.username as respone_name,leave_types.name as leave_name,
member_take_leaves.reason,member_take_leaves.from_date,member_take_leaves.to_date,
member_take_leaves.request_date,member_take_leaves.notes,member_take_leaves.created_at,
member_take_leaves.modified_at,member_take_leaves.status, 2 as type
from member_take_leaves
join members on members.id=member_take_leaves.use_member_id
join monks as response on response.id=member_take_leaves.use_handle_by_id
join leave_types on leave_types.id=member_take_leaves.use_leave_type_id
where members.status=1
