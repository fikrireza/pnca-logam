<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <p>
      New Inbox From : {{$request->email}}
    </p>

    <table>
      <tr>
        <th>
          <label>
            Nama
          </label>
        </th>
        <td>
          <label>
            {{$request->name}}
          </label>
        </td>
      </tr>
      <tr>
        <th>
          <label>
            Email
          </label>
        </th>
        <td>
          <label>
            {{$request->email}}
          </label>
        </td>
      </tr>
      <tr>
        <th>
          <label>
            Telpon
          </label>
        </th>
        <td>
          <label>
            {{$request->telpon}}
          </label>
        </td>
      </tr>
      <tr>
        <th>
          <label>
            Subjek
          </label>
        </th>
        <td>
          <label>
            {{$request->subject}}
          </label>
        </td>
      </tr>
      <tr>
        <th>
          <label>
            Pesan
          </label>
        </th>
        <td>
          <label>
            {{$request->pesan}}
          </label>
        </td>
      </tr>
    </table>

  </body>
</html>
