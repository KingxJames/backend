
SELECT *, ARRAY(select sm.name from sub_menus as sm where sm.menu_id = m.id ) FROM menus as m
