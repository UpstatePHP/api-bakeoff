### todo item
```
{
    id: int
    list: listid
    owner: userid
    assignedto: userid
    title: text
    completed: bool
    tags: [ tagids ]
    due: date
    notes: text
}
```
### todo list
```
{
    id: int
    owner: userid
    title: text
    items: [item ids]
    category: catid
}
```
### todo category
```
{
    id: int
    owner: userid
    title: text
}
```
### todo tags
```
{
    id: int
    owner: userid
    title: text
}
```
### todo user
```
{
    id: int
    name: text
    password: hash
    profile: {
        firstname: text
        lastname: text
        email: email
        website: text
    }
}
```