import { User } from '@prisma/client'

const rules = [] as { action: string; type: string; condition: Record<string, any> }[]

const casl = {
  can: (action: string, type: string, condition: Record<string, any>) => {
    rules.push({ action, type, condition })
  },
  build: {
    can(action: string, type: string, subject: Record<string, any>) {
      return rules.every((rule) => {
        const [key, value] = Object.entries(rule.condition)[0]
        return rule.action == action && rule.type === type && subject[key] == value
      })
    },
  },
}

export default (user: User) => {
  const { can, build } = casl

  //设置规则
  can('update', 'Topic', { userId: user.id })
  // can('delete', 'Topic', { userId: user.id })

  return { build }
}
