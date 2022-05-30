interface ResponseResult<T> {
  code: number
  message: string
  status: 'success' | 'error'
  data: T
}

interface ResponsePageResult<T> {
  data: T[]
  links: {
    first: string
    last: string
    prev?: any
    next: string
  }
  meta: {
    current_page: number
    from: number
    last_page: number
    links: {
      url?: string
      label: string
      active: boolean
    }[]
    path: string
    per_page: number
    to: number
    total: number
  }
}

// interface RootObject {
//   data: Datum[]
//   links: Links
//   meta: Meta
// }

// interface Meta

// interface Link

// interface Links

// interface Datum {
//   id: number;
//   title: string;
//   url?: any;
//   address: string;
//   email?: any;
//   user_id: number;
//   created_at: string;
//   updated_at: string;
//   user: User;
// }

// interface User {
//   id: number;
//   name: string;
//   sex: number;
//   home?: any;
//   avatar?: any;
//   weibo?: any;
//   wechat?: any;
//   github?: any;
//   qq?: any;
//   wakatime?: any;
//   email_verified_at: string;
//   mobile_verified_at?: any;
//   created_at: string;
//   updated_at: string;
//   lock?: any;
//   credit1?: any;
//   credit2?: any;
//   credit3?: any;
//   credit4?: any;
//   credit5?: any;
//   credit6?: any;
//   favour_count: number;
//   favorite_count: number;
// }
