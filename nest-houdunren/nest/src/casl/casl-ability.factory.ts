import { AbilityBuilder, AbilityClass } from '@casl/ability'
import { PrismaAbility, Subjects } from '@casl/prisma'
import { Injectable } from '@nestjs/common'
import { Topic, User } from '@prisma/client'

//验证能力定义：验证动作与模型
type AppAbility = PrismaAbility<
  [
    string,
    Subjects<{
      Topic: Topic
    }>,
  ]
>
const AppAbility = PrismaAbility as AbilityClass<AppAbility>

@Injectable()
export class CaslAbilityFactory {
  createForUser(user: User) {
    const { can, build } = new AbilityBuilder(AppAbility)

    //参数说明：动作，实体类型|实体对象，验证条件
    //topic模型的更新验证，要求topic.userId为user.id时通过
    can('update', 'Topic', { userId: user.id })

    return build()
  }
}
